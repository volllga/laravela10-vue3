<template>
    <div class="container">
        <h1>{{ title }}</h1>
        <div v-if="category">
            <div>Category: {{ category.category_name }}</div>
            <div>Category Description: {{ category.category_description }}</div>
            <div>Active: {{ category.active }}</div>
            <div>Created at: {{ category.created_at }}</div>
            <div>Updated at: {{ category.updated_at }}</div>
            <router-link :to="{ name: 'category.edit', params:{id: category.id}}">Edit</router-link>
        </div>
        <div v-else>
            <p>Loading...</p>
        </div>
    </div>
</template>


<script>

export default {
    name: "CategoryShow",
    setup: () => ({
        title: 'Category Show'
    }),

    mounted() {
        this.$store.dispatch('getItem', this.$route.params.id)
    },

    computed: {
       category() {
            return this.$store.getters.category
       },
    },

}
</script>

<style scoped>

</style>
