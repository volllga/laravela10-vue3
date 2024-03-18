<template>
    <div class="container">
        <h1>{{ title }}</h1>
        <div v-if="category">
            <div>Category: {{ category.category_name }}</div>
            <div>
                <span :class="{'badge rounded-pill text-bg-success': category.active, 'badge rounded-pill text-bg-secondary': !category.active}">
                                {{ category.active ? 'Active' : 'Inactive' }}
                </span>
            </div>
            <div>Category Description: {{ category.category_description }}</div>
            <div>Created at: {{ category.created_at }}</div>
            <div>Updated at: {{ category.updated_at }}</div>
            <a href="#" @click.prevent="this.$router.go(-1);">&lt; Back</a>
            <span>&nbsp;&nbsp;&nbsp;</span>
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
        this.$store.dispatch('getCategory', this.$route.params.id)
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
