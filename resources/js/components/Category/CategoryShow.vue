<template>
    <div class="container">
        <h1>{{ title }}</h1>
        <div v-if="category">
            <div>Category: {{ category.category_name }}</div>
            <div>Category Description: {{ category.category_description }}</div>
            <div>Active: {{ category.active }}</div>
            <div>Created at: {{ category.created_at }}</div>
            <router-link :to="{ name: 'category.edit', params:{id: category.id}}">Edit</router-link>
        </div>
        <div v-else>
            <p>Loading...</p>
            <!-- Add additional handling for when category is not available -->
        </div>
    </div>
</template>


<script>
import { onMounted } from 'vue';
import axios from "axios";

export default {
    name: "CategoryShow",
    setup: () => ({
        title: 'Category Show'
    }),

    data() {
        return {
            category: null
        }
    },

    mounted() {
        this.getItem()
    },

    methods: {
        getItem() {
            axios.get('/api/categories/' + this.$route.params.id)
                .then(res => {
                    this.category = res.data;
                })
                .catch(error => {
                    console.error('Error fetching category:', error);
                    // Handle the error, show a message, or redirect the user.
                });
        },
    }
}
</script>

<style scoped>

</style>
