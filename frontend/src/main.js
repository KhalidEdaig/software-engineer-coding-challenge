import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

import VueAxios from "vue-axios";
import axios from "./axios";
Vue.use(VueAxios, axios);

import "@/assets/css/tailwind.css";

import AppIcons from "@/components/icons/AppIcons";
Vue.component("app-icon", AppIcons);

import AppModal from "@/components/app/modals/AppModal.vue";
Vue.component("app-modal", AppModal);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");
