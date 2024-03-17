<template>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Employee</div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="first_name"
                                id="first_name"
                                placeholder="First Name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="last_name"
                                id="last_name"
                                placeholder="Last Name"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="position"
                                id="position"
                                placeholder="Position"

                            />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                v-model="email"
                                id="email"
                                placeholder="Email"

                            />
                        </div>

                        <div class="mb-3 form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                v-model="active"
                                id="active"
                                checked
                                hidden
                            />
                            <label class="form-check-label" for="active" hidden>Active</label>
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
    name: "Create",
    data() {
        return {
            validationErrors: null,
            first_name: '',
            last_name: '',
            position: '',
            email: '',
            active: true,
        }
    },
    computed: {
        isDisabled() {
            return this.first_name.trim() && this.last_name.trim();
        },
    },
    methods: {
        handleSubmit() {
            this.$store.dispatch('storeEmployee', {
                first_name: this.first_name,
                last_name: this.last_name,
                position: this.position,
                email: this.email,
                active: this.active,

            }).then(() => {
                this.first_name = '';
                this.last_name = '';
                this.position = '';
                this.email = '';


            }).catch(error => {
                console.error(error);
                if (error.response && error.response.status === 422) {
                    this.validationErrors = error.response.data.errors;
                } else {
                    alert("Failed to create category. Please try again.")
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
