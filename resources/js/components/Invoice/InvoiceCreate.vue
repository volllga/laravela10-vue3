<template>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Invoice</div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="number" class="form-label d-block">Invoice Number *</label>
                            <div class="d-flex align-items-center">
                                <span class="me-2">FA/</span>
                                <input
                                    type="number"
                                    class="form-control me-1"
                                    style="max-width:95px;"
                                    v-model="userInput"
                                    id="number"
                                    placeholder="Number"
                                />
                                <span>/{{ this.currentMonth }}/{{ this.currentYear }}</span>
                            </div>
                        </div>

                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Customer</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="customer_id"
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
                            v-model="date"
                            id="date"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="service_date" class="form-label">Date of service</label>
                        <input
                            type="date"
                            class="form-control"
                            v-model="service_date"
                            id="service_date"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label">Due date</label>
                        <input
                            type="date"
                            class="form-control"
                            v-model="due_date"
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
                            v-model="amount"
                            id="amount"
                            placeholder="Invoice Amount"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="currency" class="form-label">Currency</label>
                        <select id="currency" class="form-control" v-model="currency">
                            <option value="usd" selected>USD</option>
                            <option value="eur">EUR</option>
                            <option value="pln">PLN</option>
                        </select>
                    </div>

                    <button class="btn btn-secondary" @click="goBack">< Back</button>
                    <span>&nbsp;</span>
                    <button
                        :disabled="!isDisabled"
                        @click.prevent="handleSubmit"
                        type="submit"
                        class="btn btn-primary"
                    >Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>


export default {
    name: "InvoiceCreate",
    data() {
        return {
            validationErrors: null,
            userInput: '1',
            customer_id: 1,
            currency: 'usd',
// status: '',
            amount: '3500',
            date: new Date().toISOString().substr(0, 10),
            service_date: new Date().toISOString().substr(0, 10),
            due_date: new Date().toISOString().substr(0, 10),
            currentMonth: ('0' + (new Date().getMonth() + 1)).slice(-2),
            currentYear: new Date().getFullYear(),
        }
    },
    computed: {
        isDisabled() {
            return this.userInput && this.amount;
        },

        invoiceNumber() {
            return `FA/${this.userInput}/${this.currentMonth}/${this.currentYear}`;
        }
    },
    methods: {
        handleSubmit() {
            this.$store.dispatch('storeInvoice', {
                number: this.invoiceNumber,
                customer_id: this.customer_id,
                date: this.date,
                service_date: this.service_date,
                due_date: this.due_date,
                amount: this.amount,
                currency: this.currency

            }).then(() => {
                this.userInput = '';
                this.customer_id = '';
                this.amount = '';

            }).catch(error => {
                console.error(error);
                if (error.response && error.response.status === 422) {
                    this.validationErrors = error.response.data.errors;
                } else {
                    alert("Failed to create invoice. Please try again.")
                }
            });
        },

        goBack() {
            this.$router.go(-1);
        },
    }
}
</script>

<style scoped>

</style>
