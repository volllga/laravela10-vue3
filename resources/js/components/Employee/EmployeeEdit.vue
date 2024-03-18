<template>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Employee</div>
                    <div class="card-body" v-if="employee">

                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="employee.first_name"
                                id="first_name"
                                placeholder="First Name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="employee.last_name"
                                id="last_name"
                                placeholder="Last Name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="employee.position"
                                id="position"
                                placeholder="Position"

                            />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                v-model="employee.email"
                                id="email"
                                placeholder="Email"

                            />
                        </div>

                        <div class="mb-3 form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                v-model="employee.active"
                                id="active"
                                checked
                            />
                            <label class="form-check-label" for="active" >Active</label>
                        </div>
                        <button class="btn btn-secondary" @click="goBack">< Back</button>
                        <span>&nbsp;</span>
                        <button
                            :disabled="isDisabled"
                            @click.prevent="updateEmployee"
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


import router from "../../router/router.js";

export default {
    name: "EmployeeEdit",
    data() {
        return {
            employeeId: null
        };
    },

    mounted() {
        this.employeeId = this.$route.params.id;
        this.$store.dispatch('getEmployee', this.employeeId);
    },
    computed: {
        isDisabled() {
            return !this.employee || !this.employee.first_name.trim() || !this.employee.last_name.trim();
        },
        employee() {
            return this.$store.getters.employee
        }
    },
    methods: {
        updateEmployee() {
            if (!this.employee) return; // Handle edge case where category is not loaded
            const {
                id,
                first_name,
                last_name,
                position,
                email,
                active,
            } = this.employee;
            this.$store.dispatch('updateEmployee', {
                id,
                first_name,
                last_name,
                position,
                email,
                active,
            });
            router.push({name: 'employee.show', params: {id: this.employee.id}});
        },

        goBack() {
            this.$router.go(-1);
        },
    }
}
</script>

<style scoped>

</style>
