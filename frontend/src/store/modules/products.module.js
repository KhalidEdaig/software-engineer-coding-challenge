import productService from "@/services/api/products.service";

export const products = {
  namespaced: true,
  state: {
    products: [],
    pagination: null,
    deleteModal: {
      show: false,
      loading: false,
      productTodeleteId: null,
    },
    addOrEditModal: {
      show: false,
      loading: false,
      mode: null,
      product: {
        name: "",
        description: "",
        price: "",
        category_id: null,
        image: "",
      },
    },
    notification: {
      title: "",
      subtitle: "",
      show: false,
    },
    sort: {
      desc: false,
      sortBy: "",
    },
  },
  actions: {
    GET_PRODUCTS({ commit }, payload) {
      return productService.getProducts(payload).then((response) => {
        commit("SET_PRODUCTS", response.products);
        commit("SET_PAGINATION", response.meta);
      });
    },
    DELETE_PRODUCT({ commit, state }) {
      return productService
        .deleteProduct(state.deleteModal.productTodeleteId)
        .then(() => {
          commit("DELETE_PRODUCT", state.deleteModal.productTodeleteId);
          commit("SET_NOTIFICATION", {
            state: true,
            title: "Produit supprimé!",
            subtitle: "Produit supprimé avec succès",
          });
        });
    },
    ADD_PRODUCT({ state, commit, dispatch }) {
      return productService
        .addProduct(state.addOrEditModal.product)
        .then((response) => {
          commit("ADD_PRODUCT", response);
          dispatch(
            "display/DISPLAY_NOTIFICATION",
            {
              title: "Produit ajouté!",
              subtitle: "Produit ajouté avec succès.",
            },
            { root: true }
          );
        });
    },
    ADD_OR_EDIT_PRODUCT({ state, commit, dispatch }) {
      let payload = (({
        id,
        name,
        description,
        price,
        category_id,
        image,
      }) => ({
        id,
        name,
        description,
        price,
        category_id,
        image,
      }))(state.addOrEditModal.product);
      if (state.addOrEditModal.mode === "add") {
        return productService.addProduct(payload).then((response) => {
          commit("ADD_PRODUCT", response);
          commit("EMPTY_FORM");
          dispatch(
            "display/DISPLAY_NOTIFICATION",
            {
              title: "Produit ajouté!",
              subtitle: "Produit ajouté avec succès.",
            },
            { root: true }
          );
        });
      }
      return productService.editProduct(payload).then((response) => {
        commit("EDIT_PRODUCT", response);
        commit("EMPTY_FORM");
        dispatch(
          "display/DISPLAY_NOTIFICATION",
          {
            title: "Produit modifié!",
            subtitle: "les informations de ce produit ont été modifiées.",
          },
          { root: true }
        );
      });
    },
  },
  mutations: {
    SET_PRODUCTS(state, products) {
      state.products = products;
    },
    SET_PAGINATION(state, pagination) {
      state.pagination = pagination;
    },
    DELETE_PRODUCT(state, id) {
      const index = state.products.findIndex((product) => product.id === id);
      state.products.splice(index, 1);
      state.deleteModal.show = false;
      state.deleteModal.loading = false;
    },
    ADD_PRODUCT(state, product) {
      state.products.push(product);
      state.addOrEditModal.show = false;
    },
    EDIT_PRODUCT(state, product) {
      const index = state.products.findIndex((prod) => prod.id === product.id);
      state.products.splice(index, 1, product);
      state.addOrEditModal.show = false;
    },
    SET_DELETE_MODAL(state, payload) {
      if (payload.productId)
        state.deleteModal.productTodeleteId = payload.productId;
      state.deleteModal.show = payload.state;
    },
    SET_ADD_OR_EDIT_MODAL(state, payload) {
      state.addOrEditModal.product.name = "";
      state.addOrEditModal.product.description = "";
      state.addOrEditModal.product.image = "";
      state.addOrEditModal.product.price = "";
      state.addOrEditModal.product.category_id = null;
      if (payload.mode === "edit")
        state.addOrEditModal.product = Object.assign({}, payload.product);
      state.addOrEditModal.mode = payload.mode;
      state.addOrEditModal.show = payload.state;
    },
    EMPTY_FORM(state) {
      state.addOrEditModal.product.name = "";
      state.addOrEditModal.product.description = "";
      state.addOrEditModal.product.image = "";
      state.addOrEditModal.product.price = "";
      state.addOrEditModal.product.category_id = null;
    },
    UPDATE_NAME(state, name) {
      state.addOrEditModal.product.name = name;
    },
    UPDATE_DESCRIPTION(state, description) {
      state.addOrEditModal.product.description = description;
    },
    UPDATE_PRICE(state, price) {
      state.addOrEditModal.product.price = price;
    },
    UPDATE_CATEGORY_ID(state, category_id) {
      state.addOrEditModal.product.category_id = category_id;
    },
    UPDATE_IMAGE(state, image) {
      state.addOrEditModal.product.image = image;
    },
    UPDATE_DESC(state, value) {
      state.sort.desc = value;
    },
    UPDATE_SORT_BY(state, value) {
      state.sort.sortBy = value;
    },
  },
};
