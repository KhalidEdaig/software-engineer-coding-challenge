<template>
  <div class="pt-2 pb-6 md:py-6">
    <div class="flex items-center px-4 sm:px-6 md:px-8">
      <h1 class="text-2xl font-semibold text-gray-900">Categories</h1>
    </div>
    <div class="mt-4">
      <div class="flex flex-col">
        <div class="py-2 overflow-x-auto sm:px-6 lg:px-8">
          <div
            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
          >
            <table class="min-w-full">
              <thead>
                <tr
                  class="cursor-pointer bg-indigo-600 rounded-l-lg text-white hover:bg-indigo-700"
                >
                  <th
                    class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium uppercase tracking-wider"
                  >
                    Name
                  </th>
                  <th
                    class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium uppercase tracking-wider"
                  >
                    create at
                  </th>
                  <th class="px-6 py-3 border-b border-gray-200"></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(category, index) in categories"
                  :key="index"
                  class="bg-white"
                >
                  <td
                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-800"
                  >
                    {{ category.name }}
                  </td>

                  <td
                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-800"
                  >
                    {{ category.created_at }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- BEGIN navigation -->
          <app-pagination
            :pagination="pagination"
            @select-page="(page) => getCategories({ page })"
            @next="getCategories({ page: ++pagination.current_page })"
            @prev="getCategories({ page: --pagination.current_page })"
          ></app-pagination>
          <!-- END navigation -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";
import AppPagination from "@/components/app/pagination/AppPagination.vue";

export default {
  name: "CategoriesList",

  mounted() {
    this.getCategories({
      page: 1,
    });
  },
  methods: {
    ...mapActions({
      getCategories: "categories/GET_CATEGORIES",
    }),
  },
  computed: {
    ...mapState("categories", {
      categories: (state) => state.categories,
      pagination: (state) => state.pagination,
    }),
  },

  components: {
    AppPagination,
  },
};
</script>

<style></style>
