<template>
    <div>
        <h1>{{ title }}</h1>
    </div>
    <create-component></create-component>
    <table-component ref="categories"></table-component>
</template>

<script>
import CreateComponent from "@/components/CreateComponent.vue";
import TableComponent from "@/components/TableComponent.vue";
export default {
    name: "Categories",
    components: {TableComponent, CreateComponent},
    setup: () => ({
        title: 'Categories'
    })
}
</script>

<style scoped>

</style>
