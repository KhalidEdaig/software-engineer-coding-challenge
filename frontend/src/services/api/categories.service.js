import axios from "axios";

export default {
  getAllCategories() {
    return axios
      .get("categories")
      .then((response) => response.data.payload || []);
  },
  getCategoriesFiltred(payload) {
    let query = `categories/filtred?page=${payload.page}`;
    return axios.post(query).then((response) => response.data.payload || []);
  },
};
