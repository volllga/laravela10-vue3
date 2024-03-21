<template>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <input v-model="filters.first_name" type="text" class="form-control" id="first_name" placeholder="First Name"/>
            </div>
            <div class="col">
                <input v-model="filters.last_name" type="text" class="form-control" id="last_name" placeholder="Last Name"/>
            </div>
            <div class="col">
                <input v-model="filters.position" type="text" class="form-control" id="position" placeholder="Position"/>
            </div>
            <!--            <div class="col-auto d-flex align-items-center">-->
            <!--                <input v-model="filters.active" type="checkbox" class="form-check-input m-lg-1" id="active"/>-->
            <!--                <label class="form-check-label m-lg-1" for="active">Active</label>-->
            <!--            </div>-->
            <div class="col-auto">
                <button type="button" class="btn btn-outline-primary btn-sml m-lg-1" @click="applyFilter">Apply Filter</button>
                <button type="button" class="btn btn-outline-secondary btn-sml m-lg-1" @click="clearFilters">Clear</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EmployeeFilter",
    data() {
        return {
            filters: {
                first_name: '',
                last_name: '',
                position: '',
                // active: true
            }
        }
    },
    methods: {
        applyFilter() {
            this.$store.dispatch('getFilteredEmployees', this.filters);
        },
        clearFilters() {
            this.filters.first_name = '';
            this.filters.last_name = '';
            this.filters.position = '';
            // this.filters.active = true; // uncomment this line if you also want to clear the 'active' filter
            this.$store.dispatch('getEmployees');
        }
    }
}
</script>

<style scoped>
/* Add any necessary styling */
</style>
