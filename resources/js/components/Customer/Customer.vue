<template>
    <div class="container">
        <button class="btn btn-primary m-lg-1" style="float: right" @click.prevent="createCustomer">Add Customer</button>
    </div>
    <div class="container">
        <h2>Customers</h2>
    </div>
    <customers ref="customers"></customers>
</template>

<script>
import Customers from "../Customer/Customers.vue";
export default {
    name: "Customer",

    components: { Customers },

    methods: {
        createCustomer() {
            this.$router.push({ name: 'customer.create' });
        }
    }
}
</script>

<style scoped>

</style>
