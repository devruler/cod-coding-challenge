<template>
    <div class="py-8">
        <span>Create Product</span> <Link class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="/products/add">Add New</Link>

        <div>
            <h1>Products list</h1>

            <!-- Filters -->
            <div>
                <h4>Filters</h4>
                <div>
                    <label for="">Sort by</label>
                    <select v-model="filters.sortBy" @change="applyFilters">
                        <option value=""></option>
                        <option value="nameDesc">Name Desc</option>
                        <option value="nameAsc">Name Asc</option>
                        <option value="priceDesc">Price Desc</option>
                        <option value="priceAsc">Price Asc</option>
                    </select>
                </div>

                <div>
                    <label for="">Category</label>
                    <select v-model="filters.selectedCategory" @change="applyFilters">
                        <option value=""></option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
                    </select>
                </div>
            </div>
            <table>
        <!-- Table header -->
        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
          </tr>
        </thead>

        <!-- Table body -->
        <tbody>
          <tr v-for="product in products.data" :key="product.id">
            <td >
              <img v-if="product.image" :src="storagePath + product.image" alt="Product Image" width="100" height="75" />
            </td>
            <td>{{ product.name }}</td>
            <td>{{ product.description }}</td>
            <td>{{ product.price }}</td>
          </tr>
        </tbody>
      </table>

      <!-- Pagination links -->
      <div>
        <ul>
          <li v-for="link in products.links" :key="link.label" :class="{ active: link.active }">
            <Link :href="link.url">{{ link.label }}</Link>
          </li>
        </ul>
      </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import axios from "axios";
import { ref, onMounted, reactive } from "vue";

defineProps({
    storagePath: {
    type: String,
  },
  products: {
    type: Object,
  },
  categories: {
    type: Array,
  },
});

const filters = reactive({
  sortBy: "",
  category: "",
});

const fetchPage = async (url) => {
  const response = await axios.get(url);
  return response;
};

const applyFilters = () => {
  const url = `/products?page=1&sortBy=${filters.sortBy}&category=${filters.selectedCategory || ""}`;
  console.log(url)
  router.get(url)
};

</script>

<style></style>
