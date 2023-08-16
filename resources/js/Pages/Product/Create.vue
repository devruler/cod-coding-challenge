<template>
    <div>
        <form @submit.prevent="createProduct">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" v-model="product.name" required />
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea
                    id="description"
                    v-model="product.description"
                    required
                ></textarea>
            </div>
            <div>
                <label for="price">Price:</label>
                <input
                    type="number"
                    id="price"
                    v-model="product.price"
                    step="0.01"
                    required
                />
            </div>
            <div>
                <select
                    v-model="product.categories"
                    @change="applyFilters"
                    multiple
                >
                    <option value=""></option>
                    <option
                        v-for="category in categories"
                        :key="category.id"
                        :value="category.id"
                    >
                        {{ category.name }}
                    </option>
                </select>
            </div>
            <div>
                <label for="image">Image:</label>
                <input
                    type="file"
                    id="image"
                    @change="handleImageChange"
                    accept="image/*"
                />
            </div>
            <div>
                <button type="submit">Create Product</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { Head, Link, router, usePage } from "@inertiajs/vue3";
import { ref, reactive } from "vue";

const { categories } = usePage().props;
const product = reactive({
    name: "",
    description: "",
    price: 0,
    image: null,
    categories: [],
});

const handleImageChange = (event) => {
    product.image = event.target.files[0];
};

const createProduct = async () => {
    router.post("/products", product, {
        onSuccess: (page) => {
            console.log(page);
        },
        onError: (errors) => {
            console.log(errors);
        },
    });
};
</script>

<style></style>
