<template>
    <div class="container">
        <h1>{{ title }}</h1>
        <button @click.prevent="go" class="btn btn-primary">Go to Categories</button>
    </div>
</template>

<script>
import router from "../router.js";

export default {
    name: "Home",
    setup: () => ({
        title: 'Home'
    }),

    methods: {
        go() {
            router.push({ name: 'category.index'})
        }
    }
}
</script>

<style scoped>

</style>
