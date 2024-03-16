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
        <button type="button" @click.prevent="updateCategory" class="btn btn-primary" :disabled="isDisabled">Submit</button>
    </div>
</template>

<script>
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
        isDisabled() {
            return !this.category || !this.category.category_name.trim();
        },
        isAllowEditDescription() {
            return this.$store.getters.description;
        },
        category() {
            return this.$store.getters.category;
        }
    },
    methods: {
        updateCategory() {
            if (!this.category) return; // Handle edge case where category is not loaded
            const { id, category_name, category_description, active } = this.category;
            this.$store.dispatch('update', { id, category_name, category_description, active });
        }
    }
};
</script>

<style scoped>

</style>
