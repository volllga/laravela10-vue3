<template>
    <div>Color: {{ obj.color }}</div>
    <div>Number: {{ obj.number }}</div>
    <div>{{ obj.active ? 'Active' : 'Inactive' }}</div>
</template>

<script>
export default {
    name: "SomeComponent",

    data() {
        return {}
    },

    props: [
        'obj'
    ]
}
</script>

<style scoped>

</style>
