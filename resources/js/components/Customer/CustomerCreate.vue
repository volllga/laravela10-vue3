<template>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Customer</div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="customer.company_name"
                                id="company_name"
                                required
                            />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                v-model="customer.email"
                                id="email"
                                required
                            />
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="customer.address"
                                id="address"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="customer.city"
                                id="city"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="customer.country"
                                id="country"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input
                                type="tel"
                                class="form-control"
                                v-model="customer.phone"
                                id="phone"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="tax_identifier" class="form-label">Tax Identifier</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="customer.tax_identifier"
                                id="tax_identifier"
                            />
                        </div>

                        <button class="btn btn-secondary" @click="goBack">< Back</button>
                        <span>&nbsp;</span>
                        <button
                            :disabled="!isDisabled"
                            @click.prevent="handleSubmit"
                            type="submit"
                            class="btn btn-primary"
                        >Submit</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


export default {
    name: "CustomerCreate",
    data() {
        return {
            customer: {
                company_name: '',
                email: '',
                address: '',
                city: '',
                country: '',
                phone: '',
                tax_identifier: ''
            },
            errors: {}
        };
    },
    computed: {
        isDisabled() {
            return this.customer.company_name.trim() && this.customer.email.trim();
        },

    },
    methods: {
        handleSubmit() {
            this.$store.dispatch('storeCustomer', this.customer)
                .then(() => {
                    this.customer = {
                        company_name: '',
                        email: '',
                        address: '',
                        city: '',
                        country: '',
                        phone: '',
                        tax_identifier: ''
                    };
                })
                .catch(error => {
                    console.error(error);
                    if (error.response && error.response.status === 422) {
                        // Assign validation errors from the response to the errors object
                        this.errors = error.response.data.errors;
                    } else {
                        alert("Failed to create customer. Please try again.");
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
