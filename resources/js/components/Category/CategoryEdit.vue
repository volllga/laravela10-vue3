<template>
    <div class="container">
        <router-link :to="{ name: 'category.show', params:{id: this.$route.params.id}}">Back to Show</router-link>
        <h2>Edit Category</h2>
        <div class="w-50" v-if="category">
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" v-model="category.category_name" class="form-control" id="categoryName" placeholder="Category Name">
            </div>
            <div class="mb-3">
                <label for="categoryDescription" class="form-label">Category Description</label>
                <input type="text" v-model="category.category_description" class="form-control" id="categoryDescription" placeholder="Category Description"
                       :disabled="!isAllowEditDescription">
            </div>
            <div class="form-check">
                <input class="form-check-input" v-model="category.active" type="checkbox" id="active">
                <label class="form-check-label" for="active">
                    Active
                </label>
            </div>
        </div>
        <br>
        <button type="button" @click.prevent="$store.dispatch('update', {
                id: category.id,
                category_name: category.category_name,
                category_description: category.category_description,
                active: category.active,
            })" class="btn btn-primary">Submit</button>
    </div>
</template>

<script>

export default {
    name: "CategoryEdit",

    mounted() {
        this.$store.dispatch('getCategory', this.$route.params.id)
    },

    computed: {
        isDisabled()
        {
            return this.category.category_name.trim()
        },

        isAllowEditDescription() {
            return this.$store.getters.description
        },

        category() {
            return this.$store.getters.category
        },
    },
}
</script>

<style scoped>

</style>
