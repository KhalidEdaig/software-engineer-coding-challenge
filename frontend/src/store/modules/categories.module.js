import categoriesService from "@/services/api/categories.service";

export const categories = {
  namespaced: true,
  state: {
    allCategories: [],
    categories: [],
    pagination: null,
  },
  actions: {
    GET_ALL_CATEGORIES({ commit }) {
      return categoriesService.getAllCategories().then((response) => {
        commit("SET_ALL_CATEGORIES", response);
      });
    },
    GET_CATEGORIES({ commit }, payload) {
      return categoriesService
        .getCategoriesFiltred(payload)
        .then((response) => {
          commit("SET_CATEGORIES", response.categories);
          commit("SET_PAGINATION", response.meta);
        });
    },
  },
  mutations: {
    SET_ALL_CATEGORIES(state, allCategories) {
      state.allCategories = allCategories;
    },
    SET_CATEGORIES(state, categories) {
      state.categories = categories;
    },
    SET_PAGINATION(state, pagination) {
      state.pagination = pagination;
    },
  },
};
