export const display = {
  namespaced: true,
  state: {
    notification: {
      show: false,
      type: "success",
      title: "",
      subtitle: "",
    },
  },

  actions: {
    DISPLAY_NOTIFICATION({ commit }, payload) {
      commit("SET_NOTIFICATION_TITLE", payload.title);
      commit("SET_NOTIFICATION_SUBTITLE", payload.subtitle);
      commit("SET_NOTIFICATION_TYPE", payload.type);
      commit("SHOW_NOTIFICATION");
    },
  },
  mutations: {
    SHOW_NOTIFICATION(state) {
      state.notification.show = true;
      setTimeout(() => {
        state.notification.show = false;
      }, 3000);
    },
    HIDE_NOTIFICATION(state) {
      state.notification.show = false;
    },
    SET_NOTIFICATION_TITLE(state, title) {
      state.notification.title = title;
    },
    SET_NOTIFICATION_SUBTITLE(state, subtitle) {
      state.notification.subtitle = subtitle;
    },
    SET_NOTIFICATION_TYPE(state, type) {
      state.notification.type = type || "success";
    },
  },
};
