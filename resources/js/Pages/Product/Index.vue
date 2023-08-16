<template>
    <div class="py-8">
        <span>Create Product</span> <Link class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="/products/add">Add New</Link>

        <div>
            <h1>Products list</h1>

            <div>
                <div>
                    <label for="">Sort by</label>
                    <select name="sortBy">
                        <option value="nameDesc">Name Desc</option>
                        <option value="nameAsc">Name Asc</option>
                        <option value="priceDesc">Price Desc</option>
                        <option value="priceAsc">Price Asc</option>
                    </select>
                </div>

                <div>
                    <label for="">Category</label>
                    <select name="category">
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
                    </select>
                </div>
            </div>
            <table></table>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    productList: {
        type: Array,
    },
    categories: {
        type: Array,
    },
});
</script>

<style></style>
