<template>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Employee</div>
                    <div class="card-body" v-if="customer">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Company Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model.trim="customer.company_name"
                                id="first_name"
                                placeholder="First Name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Email *</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model.trim="customer.email"
                                id="last_name"
                                placeholder="Last Name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Address</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model.trim="customer.address"
                                id="position"
                                placeholder="Position"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">City</label>
                            <input
                                type="email"
                                class="form-control"
                                v-model.trim="customer.city"
                                id="email"
                                placeholder="Email"
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
                        <button class="btn btn-secondary m-lg-1" @click="goBack">&lt; Back</button>
                        <!--                        <span>&nbsp;</span>-->
                        <button
                            :disabled="isDisabled"
                            @click.prevent="updateCustomer"
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
export default {
    name: "CustomerEdit",
    data() {
        return {
            customerId: null
        };
    },
    mounted() {
        this.customerId = this.$route.params.id;
        this.$store.dispatch('getCustomer', this.customerId);
    },
    computed: {
        isDisabled() {
            return !this.customer || !this.customer.company_name.trim() || !this.customer.email.trim();
        },
        customer() {
            return this.$store.getters.customer;
        }
    },
    methods: {
        updateCustomer() {
            if (!this.customer) return; // Handle edge case where category is not loaded
            const { id, company_name, email, address,city, country, phone, tax_identifier } = this.customer;
            this.$store.dispatch('updateCustomer', { id, company_name, email, address,city, country, phone, tax_identifier });
            router.push({name: 'customer.show', params: {id: this.customer.id}});
        },
        goBack() {
            this.$router.go(-1);
        },
    }
}
</script>


<style scoped>

</style>
