<template>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Invoice</div>
                    <div class="card-body" v-if="invoice">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model.trim="invoice.number"
                                id="first_name"
                                placeholder="First Name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Customer</label>
                            <input
                                type="number"
                                class="form-control"
                                v-model="invoice.customer_id"
                                id="customer_id"
                                placeholder="Customer"
                                :disabled=true
                            />
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date of issue</label>
                            <input
                                type="date"
                                class="form-control"
                                v-model="invoice.date"
                                id="date"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="service_date" class="form-label">Date of service</label>
                            <input
                                type="date"
                                class="form-control"
                                v-model="invoice.service_date"
                                id="service_date"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due date</label>
                            <input
                                type="date"
                                class="form-control"
                                v-model="invoice.due_date"
                                id="due_date"
                            />
                        </div>
                        <div class="mb-3">
                            <!--                            <label for="last_name" class="form-label">Status *</label>-->
                            <!--                            <input-->
                            <!--                                type="text"-->
                            <!--                                class="form-control"-->
                            <!--                                v-model="status"-->
                            <!--                                id="status"-->
                            <!--                                placeholder="Status"-->
                            <!--                            />-->
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Invoice Amount</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="invoice.amount"
                                id="amount"
                                placeholder="Invoice Amount"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="currency" class="form-label">Currency</label>
                            <select id="currency" class="form-control" v-model="invoice.currency">
                                <option value="usd" selected>USD</option>
                                <option value="eur">EUR</option>
                                <option value="pln">PLN</option>
                            </select>
                        </div>

                        <button class="btn btn-secondary m-lg-1" @click="goBack">&lt; Back</button>
                        <!--                        <span>&nbsp;</span>-->
                        <button
                            :disabled="isDisabled"
                            @click.prevent="updateInvoice"
                            type="submit"
                            class="btn btn-primary m-lg-1"
                        >Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import router from "../../router/router.js";

export default {
    name: "InvoiceEdit",
    data() {
        return {
            invoiceId: null
        };
    },
    mounted() {
        this.invoiceId = this.$route.params.id;
        this.$store.dispatch('getInvoice', this.invoiceId);
    },
    computed: {
        isDisabled() {
            return !this.invoice;
        },
        invoice() {
            return this.$store.getters.invoice;
        }
    },
    methods: {
        updateInvoice() {
            if (!this.invoice) return; // Handle edge case where category is not loaded
            const { id, number, date, customer_id, service_date, due_date, amount, currency } = this.invoice;
            this.$store.dispatch('updateInvoice', { id, number, date, customer_id, service_date, due_date, amount, currency });
            router.push({ name: 'invoice.show', params: { id: this.invoice.id } });
        },
        goBack() {
            this.$router.go(-1);
        },
    }
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
