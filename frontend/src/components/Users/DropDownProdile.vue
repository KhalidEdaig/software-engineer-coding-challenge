<template>
  <div class="ml-3 relative">
    <div>
      <button
        @click="closeOrOpen"
        type="button"
        class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        id="user-menu"
        aria-expanded="false"
        aria-haspopup="true"
      >
        <span class="sr-only">Open user menu</span>
        <img class="h-8 w-8 rounded-full" src="@/assets/logo.png" alt="User" />
      </button>
    </div>

    <transition
      enter-active-class="transition-all transform ease-out"
      enter-class="translate-y-1/2 opacity-0"
      enter-to-class="translate-y-0 opacity-100"
      leave-active-class="transition-all transform ease-in"
      leave-class="translate-y-0 opacity-100"
      leave-to-class="translate-y-1/2 opacity-0"
    >
      <div
        v-if="isOpen"
        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu"
        aria-orientation="vertical"
        aria-labelledby="user-menu"
      >
        <a
          href="#"
          class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
          role="menuitem"
          >Sign out</a
        >
      </div>
    </transition>
  </div>
</template>
<script>
export default {
  name: "DropDownProdile",
  data() {
    return {
      isOpen: false,
    };
  },
  methods: {
    closeOrOpen() {
      this.isOpen = !this.isOpen;
    },
  },
};
</script>
