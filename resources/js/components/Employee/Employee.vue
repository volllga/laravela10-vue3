<template>
    <div class="container">
        Employee
    </div>
    <create></create>
    <categories ref="categories"></categories>
</template>

<script>
import Categories from "@/components/Category/Categories.vue";
import Create from "@/components/Category/Create.vue";

export default {
    name: "Employee",
    components: {Create, Categories},

}
</script>

<style scoped>

</style>
