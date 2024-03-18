<template>
    <div class="container">
        <h1>{{ title }}</h1>
        <div v-if="employee">
            <div>ID: {{ employee.id }}</div>
            <div>Active: {{ employee.active }}</div>
            <div>First Name: {{ employee.first_name }}</div>
            <div>Last Name: {{ employee.last_name }}</div>
<!--            <div>Document: {{ employee.document }}</div>-->
<!--            <div>Date of Birth: {{ employee.date_of_birth }}</div>-->
            <div>Email: {{ employee.email }}</div>
<!--            <div>Phone: {{ employee.phone }}</div>-->
            <div>Position: {{ employee.position }}</div>
<!--            <div>Residency: {{ employee.residency }}</div>-->
<!--            <div>Postal Code: {{ employee.postal_code }}</div>-->
<!--            <div>Address: {{ employee.address }}</div>-->
<!--            <div>City: {{ employee.city }}</div>-->
<!--            <div>Region: {{ employee.region }}</div>-->
<!--            <div>Country: {{ employee.country }}</div>-->
<!--            <div>Salary: {{ employee.salary }}</div>-->
<!--            <div>Photo: {{ employee.photo }}</div>-->
<!--            <div>Hire Date: {{ employee.hire_date }}</div>-->
<!--            <div>Termination Date: {{ employee.termination_date }}</div>-->
<!--            <div>Notes: {{ employee.notes }}</div>-->
            <div>Created at: {{ employee.created_at }}</div>
            <div>Updated at: {{ employee.updated_at }}</div>
            <router-link :to="{ name: 'employee.edit', params: { id: employee.id }}">Edit</router-link>
        </div>
        <div v-else>
            <p>Loading...</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "EmployeeShow",
    setup() {
        return {
            title: 'Employee Show'
        };
    },
    mounted() {
        this.$store.dispatch('getEmployee', this.$route.params.id);
    },
    computed: {
        employee() {
            return this.$store.getters.employee;
        },
    },
};
</script>

<style scoped>
/* Add your scoped styles here if needed */
</style>
