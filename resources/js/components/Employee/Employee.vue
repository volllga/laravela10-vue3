<template>
    <div class="container">
        <button class="btn btn-primary" style="float: right" @click.prevent="createEmployee">Add Employee</button>
    </div>
    <div class="container">
        <h2>Employees</h2>
    </div>
    <employees ref="employees"></employees>
</template>

<script>
import Employees from "@/components/Employee/Employees.vue";

export default {
    name: "Employee",
    components: { Employees},
    methods: {
        createEmployee() {
            this.$router.push({ name: 'employee.create' });
        }
    }

}
</script>

<style scoped>

</style>
