<template>
  <div class="mt-5 flex-1 h-0 overflow-y-auto">
    <nav class="px-2 space-y-1">
      <router-link
        :to="{ name: 'Home' }"
        :class="{
          'bg-indigo-800 text-white': currentRouterName === 'Home',
          'text-indigo-100 hover:bg-indigo-600': currentRouterName !== 'Home',
        }"
        class="group flex items-center px-2 py-2 text-sm font-medium rounded-md"
      >
        <app-icon name="shoppingBag" className="mr-3 h-6 w-6 text-gray-50" />
        Home
      </router-link>

      <router-link
        :to="{ name: 'products-list' }"
        :class="{
          'bg-indigo-800 text-white': currentRouterName === 'products-list',
          'text-indigo-100 hover:bg-indigo-600':
            currentRouterName !== 'products-list',
        }"
        class="group flex items-center px-2 py-2 text-base font-medium rounded-md"
      >
        <app-icon name="tag" className="mr-3 h-6 w-6 text-gray-50" />
        Products
      </router-link>
      <router-link
        :to="{ name: 'categories-list' }"
        :class="{
          'bg-indigo-800 text-white': currentRouterName === 'categories-list',
          'text-indigo-100 hover:bg-indigo-600':
            currentRouterName !== 'categories-list',
        }"
        class="group flex items-center px-2 py-2 text-base font-medium rounded-md"
      >
        <app-icon name="tag" className="mr-3 h-6 w-6 text-gray-50" />
        Categories
      </router-link>
    </nav>
  </div>
</template>
<script>
export default {
  name: "AppSideBarDesktop",
  computed: {
    currentRouterName: {
      get() {
        return this.$route.name;
      },
    },
  },
};
</script>
