import axios from "axios";

export default {
  getProducts(payload) {
    let query = `products?page=${payload.page}`;

    if (payload.category_id) query += `&category_id=${payload.category_id}`;
    if (payload.sortBy)
      query += `&sortBy=${payload.sortBy}&desc=${payload.desc}`;

    return axios.get(query).then((response) => response.data.payload || []);
  },
  deleteProduct(id) {
    return axios.delete(`products/${id}`);
  },
  addProduct(product) {
    return axios
      .post("products", product)
      .then((response) => response.data.payload || null);
  },
  editProduct(product) {
    return axios
      .put(`products/${product.id}`, product)
      .then((response) => response.data.payload || null);
  },
};
