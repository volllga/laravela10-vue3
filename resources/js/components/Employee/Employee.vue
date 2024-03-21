<template>
    <div class="container">
        <button class="btn btn-primary m-lg-1" style="float: right" @click.prevent="createEmployee">Add Employee</button>
    </div>
    <div class="container">
        <h2>Employees</h2>
    </div>
    <employee-filter></employee-filter>
    <employees ref="employees"></employees>
</template>

<script>
import Employees from "@/components/Employee/Employees.vue";
import EmployeeFilter from "@/components/Employee/EmployeeFilter.vue";

export default {
    name: "Employee",
    components: {EmployeeFilter, Employees},
    methods: {
        createEmployee() {
            this.$router.push({ name: 'employee.create' });
        }
    }

}
</script>

<style scoped>

</style>
