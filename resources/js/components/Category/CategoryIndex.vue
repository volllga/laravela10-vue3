<template>
    <div class="container">
        Category Index
    </div>
    <create></create>
    <categories ref="categories"></categories>
</template>

<script>
import Categories from "@/components/Category/Categories.vue";
import Create from "@/components/Category/Create.vue";

export default {
    name: "Category Index",
    components: {Create, Categories},

    data() {
        return {
            isAllowEditDescription: false,
        }
    }
}
</script>

<style scoped>

</style>
