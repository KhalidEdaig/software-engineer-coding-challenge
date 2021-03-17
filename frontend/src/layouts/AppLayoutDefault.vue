<template>
  <div class="h-screen flex overflow-hidden bg-gray-100">
    <div class="md:hidden" v-if="isOpenSideBar">
      <div class="fixed inset-0 flex z-40">
        <transition
          enter-active-class="transition-opacity ease-linear duration-600"
          enter-class="opacity-0"
          enter-to-class="opacity-100"
          leave-active-class="transition-opacity ease-linear duration-600"
          leave-class="opacity-100"
          leave-to-class="opacity-0"
        >
          <div class="fixed inset-0" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
          </div>
        </transition>

        <transition
          enter-active-class="transition ease-in-out duration-600 transform"
          enter-class="-translate-x-full"
          enter-to-class="translate-x-0"
          leave-active-class="transition ease-in-out duration-600 transform"
          leave-class="translate-x-0"
          leave-to-class="-translate-x-full"
        >
          <div
            class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4  bg-gradient-to-r from-purple-400 via-purple-500 to-purple-600"
          >
            <div class="absolute top-0 right-0 -mr-12 pt-2">
              <button
                @click="isOpenSideBar = !isOpenSideBar"
                class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
              >
                <span class="sr-only">Close sidebar</span>
                <app-icon name="x" className="h-6 w-6 text-gray-50" />
              </button>
            </div>
            <div class="flex-shrink-0 flex items-center px-4">
              <span
                class="text-4xl font-extrabold tracking-tight bg-clip-text text-transparent text-gray-50"
              >
                C.CH.S.E
              </span>
            </div>
            <app-side-bar-mobile />
          </div>
        </transition>
      </div>
    </div>

    <!-- Static sidebar for desktop -->
    <app-side-bar-desktop />
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
      <div
        class="relative z-10 flex-shrink-0 flex h-16 bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 shadow"
      >
        <button
          @click="isOpenSideBar = !isOpenSideBar"
          class="px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden"
        >
          <span class="sr-only">Open sidebar</span>

          <app-icon name="menu" className="h-6 w-6 text-gray-50" />
        </button>
        <div class="flex-1 px-4 flex justify-between items-center">
          <div>
            <span class="text-xl text-gray-50 font-semibold tracking-wide"
              >Welcome to coding challenge software engineer 😍</span
            >
          </div>
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile -->
            <drop-down-prodile />
          </div>
        </div>
      </div>

      <main
        class="flex-1 relative overflow-y-auto focus:outline-none"
        tabindex="0"
      >
        <div class="py-6">
          <!-- <div class=" px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">
              {{ currentRouterName }}
            </h1>
          </div> -->
          <div class=" px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
            <div class="py-4">
              <router-view></router-view>
            </div>
            <!-- /End replace -->
          </div>
        </div>
      </main>
    </div>
  </div>
</template>
<script>
import DropDownProdile from "@/components/Users/DropDownProdile.vue";
import AppSideBarDesktop from "@/components/app/navigation/AppSideBarDesktop.vue";
import AppSideBarMobile from "@/components/app/navigation/AppSideBarMobile.vue";
export default {
  components: { DropDownProdile, AppSideBarDesktop, AppSideBarMobile },
  name: "AppLayoutDefault",
  data: () => {
    return {
      isOpenSideBar: false,
    };
  },
  computed: {
    currentRouterName: {
      get() {
        return this.$route.name;
      },
    },
  },
};
</script>
