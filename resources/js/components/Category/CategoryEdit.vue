<template>
    <div class="container">
        <router-link :to="{ name: 'category.show', params: { id: categoryId }}">Back to Show</router-link>
        <h2>Edit Category</h2>
        <div class="w-50" v-if="category">
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" v-model="category.category_name" class="form-control" id="categoryName" placeholder="Category Name">
            </div>
            <div class="mb-3">
                <label for="categoryDescription" class="form-label">Category Description</label>
                <input type="text" v-model="category.category_description" class="form-control" id="categoryDescription" placeholder="Category Description" :disabled="!isAllowEditDescription">
            </div>
            <div class="form-check">
                <input class="form-check-input" v-model="category.active" type="checkbox" id="active">
                <label class="form-check-label" for="active">Active</label>
            </div>
        </div>
        <br>
        <button class="btn btn-secondary" @click.prevent="this.$router.go(-1);">&lt; Back</button>
        <span>&nbsp;</span>
        <button type="button" @click.prevent="updateCategory" class="btn btn-primary" :disabled="isDisabled">Submit</button>
    </div>
</template>

<script>
import router from "../../router/router.js";
import {mapGetters} from 'vuex';
export default {
    name: "CategoryEdit",
    data() {
        return {
            categoryId: null
        };
    },
    mounted() {
        this.categoryId = this.$route.params.id;
        this.$store.dispatch('getCategory', this.categoryId);
    },
    computed: {
        ...mapGetters({
            isAllowEditDescription: "description",
            category: "category"
        }),
        isDisabled() {
            return !this.category || !this.category.category_name.trim();
        },
    },
    methods: {
        updateCategory() {
            if (!this.category) return; // Handle edge case where category is not loaded
            const { id, category_name, category_description, active } = this.category;
            this.$store.dispatch('update', { id, category_name, category_description, active });
            router.push({name: 'category.show', params: {id: this.category.id}});
        }
    }
};
</script>

<style scoped>

</style>
