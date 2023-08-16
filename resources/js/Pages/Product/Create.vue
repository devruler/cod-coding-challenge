<template>
    <div>
        <form @submit.prevent="createProduct">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="product.name" required />
      </div>
      <div>
        <label for="description">Description:</label>
        <textarea id="description" v-model="product.description" required></textarea>
      </div>
      <div>
        <label for="price">Price:</label>
        <input type="number" id="price" v-model="product.price" step="0.01" required />
      </div>
      <div>
        <label for="image">Image:</label>
        <input type="file" id="image" @change="handleImageChange" accept="image/*" />
      </div>
      <div>
        <button type="submit">Create Product</button>
      </div>
    </form>
    </div>
</template>

<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const { categories } = usePage().props;
const product = ref({
  name: '',
  description: '',
  price: 0,
  image: null,
});

const handleImageChange = (event) => {
  product.image = event.target.files[0];
};

const createProduct = async () => {
  const formData = new FormData();
  formData.append('name', product.name);
  formData.append('description', product.description);
  formData.append('price', product.price);
  if (product.image) {
    formData.append('image', product.image);
  }

  await axios.post(route('products.store'), formData);
};
</script>



<style>

</style>
