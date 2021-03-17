import Vue from "vue";

import Router from "vue-router";

import HomePage from "@/views/Home";

import ProductsPage from "@/views/products";
import CategoriesPage from "@/views/categories";

Vue.use(Router);

const router = new Router({
  routes: [
    {
      name: "Home",
      path: "/home",
      component: HomePage,
    },
    {
      name: "products-list",
      path: "/products",
      component: ProductsPage,
    },
    {
      name: "categories-list",
      path: "/categories",
      component: CategoriesPage,
    },
  ],
});
router.beforeEach((to, from, next) => {
  if (to.path === "/") {
    return next({ name: "Home" });
  } else {
    return next();
  }
});
export default router;
