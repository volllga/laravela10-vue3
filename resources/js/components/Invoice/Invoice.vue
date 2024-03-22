<template>
    <div class="container">
        <button class="btn btn-primary m-lg-1" style="float: right" @click.prevent="createInvoice">Add Invoice</button>
    </div>
    <div class="container">
        <h2>Invoices</h2>
    </div>
    <invoices ref="invoices"></invoices>
</template>

<script>
import Invoices from "../Invoice/Invoices.vue";
export default {
    name: "Invoice",

    components: {Invoices},

    methods: {
        createInvoice() {
            this.$router.push({ name: 'invoice.create' });
        }
    }
}
</script>

<style scoped>

</style>
