import Vue from "vue";
import Vuex from "vuex";

import { products } from "./modules/products.module";
import { categories } from "./modules/categories.module";
import { display } from "./modules/display.module";

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    products,
    categories,
    display,
  },
});

export default store;
