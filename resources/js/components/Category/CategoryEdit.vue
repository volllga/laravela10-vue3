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
        <button type="button" @click.prevent="update()" class="btn btn-primary">Submit</button>
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
            return this.categoryName.trim()
        },

        isAllowEditDescription() {
            return this.$store.getters.description
        },

        category() {
            return this.$store.getters.category
        },
    },

    methods: {

        update() {
            axios.patch(`/api/categories/${this.$route.params.id}`, {
                category_name: this.categoryName,
                category_description: this.categoryDescription,
                active: this.active,
            })
                .then(() => {
                    this.$router.push({name: 'category.show', params: {id: this.$route.params.id}})
                    alert("Category updated successfully!")
                })
        },
    }
}
</script>

<style scoped>

</style>
