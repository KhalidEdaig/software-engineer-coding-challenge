<template>
  <div class="pt-2 pb-6 md:py-6">
    <div class="flex items-center px-4 sm:px-6 md:px-8">
      <h1 class="text-2xl font-semibold text-gray-900">Products</h1>
      <span class="inline-flex rounded-md shadow-sm">
        <button
          @click="setAddOrEditModalState({ state: true, mode: 'add' })"
          type="button"
          class="inline-flex items-center px-4 py-2 ml-6 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"
        >
          <svg
            class="-ml-1 mr-2 h-5 w-5"
            fill="white"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path
              d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z"
            />
          </svg>
          Add new product
        </button>
      </span>
      <div class="mt-1 relative rounded-md shadow-sm ml-auto flex justify-end">
        <div class="">
          <ul class="grid grid-cols-1 gap-2">
            <li>
              <div class="relative rounded-md shadow-sm">
                <select
                  id="city"
                  class="block w-full pl-2 pr-10 py-2 text-base leading-6 border-gray-400 border rounded focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"
                  v-model="choosedCategoryId"
                >
                  <option value="" selected>All Categories</option>
                  <option
                    v-for="(category, index) in allCategories"
                    :key="index"
                    :value="category.id"
                  >
                    {{ category.name }}
                  </option>
                </select>
              </div>
            </li>
          </ul>
        </div>
      </div>
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
                    Image
                  </th>
                  <th
                    class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium uppercase tracking-wider"
                  >
                    <div class="flex justify-between items-center">
                      <span>Name</span>
                      <button
                        @click="handleSort('name')"
                        type="button"
                        class="inline-flex items-center px-0.5 py-1  text-xs font-medium rounded bg-indigo-100 hover:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                      >
                        <app-icon
                          :name="'selector'"
                          :className="'w-6 h-6 text-indigo-600'"
                        />
                      </button>
                    </div>
                  </th>

                  <th
                    class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium uppercase tracking-wider"
                  >
                    <div class="flex justify-between items-center">
                      <span>Price</span>
                      <button
                        @click="handleSort('price')"
                        type="button"
                        class="inline-flex items-center px-0.5 py-1  text-xs font-medium rounded bg-indigo-100 hover:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                      >
                        <app-icon
                          :name="'selector'"
                          :className="'w-6 h-6 text-indigo-600'"
                        />
                      </button>
                    </div>
                  </th>
                  <th
                    class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium uppercase tracking-wider"
                  >
                    Category
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
                  v-for="(product, index) in products"
                  :key="index"
                  class="bg-white"
                >
                  <td
                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900"
                  >
                    <!-- <img class="w-12" :src="'http://localhost:8000/'+product.image" /> -->
                    <img
                      class="w-12 rounded cursor-pointer"
                      :src="product.image"
                    />
                  </td>

                  <td
                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-800"
                  >
                    {{ product.name }}
                  </td>
                  <td
                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-800"
                  >
                    {{ product.price }}
                  </td>
                  <td
                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-800"
                  >
                    {{ product.category.name }}
                  </td>
                  <td
                    class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-800"
                  >
                    {{ product.created_at }}
                  </td>
                  <td
                    class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium"
                  >
                    <button
                      @click="
                        setAddOrEditModalState({
                          state: true,
                          mode: 'edit',
                          product,
                        })
                      "
                      class="text-indigo-600 hover:text-indigo-900 cursor-pointer"
                    >
                      Edit
                    </button>
                    <button
                      class="text-red-500 hover:text-red-700 ml-2 cursor-pointer"
                      @click="
                        setDeleteModalState({
                          state: true,
                          productId: product.id,
                        })
                      "
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- BEGIN navigation -->
          <app-pagination
            :pagination="pagination"
            @select-page="(page) => getProducts({ page })"
            @next="getProducts({ page: ++pagination.current_page })"
            @prev="getProducts({ page: --pagination.current_page })"
          ></app-pagination>
          <!-- END navigation -->
        </div>
      </div>
    </div>
    <!-- BEGIN modal -->
    <app-modal
      v-show="isDeleteModalActive"
      :is-shown="isDeleteModalActive"
      title="delete this product"
      subtitle="Are you sure you want to remove this product? All your data will be permanently deleted. This action cannot be undone."
      :loading="deleteModalLoading"
      @confirm="deleteProduct()"
      @cancel="setDeleteModalState({ state: false })"
    ></app-modal>
    <!-- END modal -->
    <!-- BEGIN slide over -->
    <app-slide-over
      title="Add new product"
      subtitle="Fill out this form to add a new product"
      v-show="isAddOrEditModalActive"
      :is-shown="isAddOrEditModalActive"
      @cancel="setAddOrEditModalState({ state: false })"
      @confirm="addOrEditProduct"
    >
      <form action>
        <div class="mt-4">
          <label
            for="name"
            class="block text-sm font-medium leading-5 text-gray-700"
            >Name</label
          >
          <div class="mt-1 relative rounded-md shadow-sm">
            <input
              id="name"
              class="form-input block w-full sm:text-sm sm:leading-5 px-3 py-2 border-gray-400 border rounded"
              placeholder="ex: support téléphone"
              type="text"
              v-model="name"
            />
          </div>
        </div>
        <div class="mt-4">
          <label
            for="price"
            class="block text-sm font-medium leading-5 text-gray-700"
            >Price</label
          >
          <div class="mt-1 relative rounded-md shadow-sm">
            <input
              id="price"
              class="form-input block w-full sm:text-sm sm:leading-5 px-3 py-2 border-gray-400 border rounded"
              placeholder="200"
              type="number"
              v-model="price"
              min="0"
              step="1"
            />
          </div>
        </div>
        <div class="mt-4">
          <label
            for="note"
            class="block text-sm font-medium leading-5 text-gray-700"
            >Description</label
          >
          <div class="mt-1 relative rounded-md shadow-sm w-full">
            <textarea
              id="note"
              class="form-input block w-full sm:text-sm sm:leading-5 px-3 py-2 border-gray-400 border rounded"
              placeholder="ex: reporté"
              v-model="description"
            />
          </div>
        </div>
        <div class="mt-4">
          <label
            for="city"
            class="block text-sm leading-5 font-medium text-gray-700"
            >Category</label
          >
          <select
            id="category_id"
            class="mt-1 block w-full pl-2 pr-10 py-2 text-base leading-6 border-gray-400 border rounded focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5"
            v-model="categoryId"
          >
            <option></option>
            <option
              v-for="category in allCategories"
              :key="category.id"
              :value="category.id"
            >
              {{ category.name }}
            </option>
          </select>
        </div>
        <div class="mt-4">
          <label
            for="image"
            class="block text-sm font-medium leading-5 text-gray-700"
            >Photo</label
          >
          <div class="mt-1 relative rounded-md shadow-sm">
            <input
              id="image"
              class="form-input block w-full sm:text-sm sm:leading-5 px-3 py-2 border-gray-400 border rounded"
              placeholder="https://img.ur/eOR32.jpg"
              type="text"
              v-model="image"
            />
          </div>
        </div>
      </form>
    </app-slide-over>
    <!-- END slide over -->
    <!-- BEGIN app notification -->
    <app-notification
      v-show="notification.show"
      :is-shown="notification.show"
      :title="notification.title"
      :subtitle="notification.subtitle"
      @close="closeNotification({ state: false })"
    ></app-notification>
    <!-- END app notification -->
  </div>
</template>

<script>
import { mapActions, mapState, mapMutations } from "vuex";
import AppPagination from "@/components/app/pagination/AppPagination.vue";
import AppModal from "@/components/app/modals/AppModal.vue";
import AppSlideOver from "@/components/app/slideovers/AppSlideOver.vue";
import AppNotification from "@/components/app/notifications/AppNotification.vue";

export default {
  name: "ProductList",
  data() {
    return {
      query: "",
      choosedCategoryId: "",
    };
  },
  mounted() {
    this.getProducts({
      page: 1,
    });
    this.getAllCategories();
  },
  methods: {
    ...mapActions({
      getProducts: "products/GET_PRODUCTS",
      getAllCategories: "categories/GET_ALL_CATEGORIES",
      deleteProduct: "products/DELETE_PRODUCT",
      addOrEditProduct: "products/ADD_OR_EDIT_PRODUCT",
    }),
    ...mapMutations({
      setDeleteModalState: "products/SET_DELETE_MODAL",
      setAddOrEditModalState: "products/SET_ADD_OR_EDIT_MODAL",
      closeNotification: "products/SET_NOTIFICATION",
      updateName: "products/UPDATE_NAME",
      updateDescription: "products/UPDATE_DESCRIPTION",
      updatePrice: "products/UPDATE_PRICE",
      updateCategoryId: "products/UPDATE_CATEGORY_ID",
      updateImage: "products/UPDATE_IMAGE",
      updateDesc: "products/UPDATE_DESC",
      updateSortBy: "products/UPDATE_SORT_BY",
    }),
    getProductsWithAppliedFilters(payload) {
      if (this.choosedCategoryId)
        payload["category_id"] = this.choosedCategoryId;
      this.getProducts(payload);
    },
    handleSort(option) {
      this.desc = !this.desc;
      this.sortBy = option;
      this.getProducts({
        page: this.pagination.current_page,
        sortBy: this.sortBy,
        desc: this.desc,
      });
    },
  },
  computed: {
    ...mapState("products", {
      products: (state) => state.products,
      pagination: (state) => state.pagination,
      isDeleteModalActive: (state) => state.deleteModal.show,
      deleteModalLoading: (state) => state.deleteModal.loading,
      isAddOrEditModalActive: (state) => state.addOrEditModal.show,
      notification: (state) => state.notification,
    }),
    allCategories: {
      get() {
        return this.$store.state.categories.allCategories;
      },
    },
    desc: {
      get() {
        return this.$store.state.products.sort.desc;
      },
      set(value) {
        this.updateDesc(value);
      },
    },
    sortBy: {
      get() {
        return this.$store.state.products.sort.sortBy;
      },
      set(value) {
        this.updateSortBy(value);
      },
    },
    name: {
      get() {
        return this.$store.state.products.addOrEditModal.product.name;
      },
      set(value) {
        this.updateName(value);
      },
    },
    description: {
      get() {
        return this.$store.state.products.addOrEditModal.product.description;
      },
      set(value) {
        this.updateDescription(value);
      },
    },
    price: {
      get() {
        return this.$store.state.products.addOrEditModal.product.price;
      },
      set(value) {
        this.updatePrice(value);
      },
    },
    categoryId: {
      get() {
        return this.$store.state.products.addOrEditModal.product.category_id;
      },
      set(value) {
        this.updateCategoryId(value);
      },
    },
    image: {
      get() {
        return this.$store.state.products.addOrEditModal.product.image;
      },
      set(value) {
        this.updateImage(value);
      },
    },
  },
  watch: {
    choosedCategoryId() {
      this.getProductsWithAppliedFilters({
        page: 1,
      });
    },
  },
  components: {
    AppPagination,
    AppModal,
    AppSlideOver,
    AppNotification,
  },
};
</script>

<style></style>
