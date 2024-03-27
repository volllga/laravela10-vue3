<template>
    <a :href="downloadLink" download>Download PDF</a>

</template>

<script>
export default {
    name: "InvoiceShow",

    data() {
        return {
            invoiceId: null
        };
    },

    mounted() {
        this.invoiceId = this.$route.params.id;
        this.$store.dispatch('getInvoice', this.$route.params.id);
    },
    computed: {
        invoice() {
            return this.$store.getters.invoice;
        },
        downloadLink() {
            return `/api/invoices/${this.invoiceId}/generate-pdf`;
        }
    },

}
</script>

<style scoped>

</style>
