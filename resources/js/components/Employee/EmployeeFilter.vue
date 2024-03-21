<template>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <input
                    type="text"
                    class="form-control"
                    id="first_name"
                    placeholder="First Name"
                />
            </div>
            <div class="col">
                <input
                    type="text"
                    class="form-control"
                    id="last_name"
                    placeholder="Last Name"
                />
            </div>
            <div class="col">
                <input
                    type="text"
                    class="form-control"
                    id="position"
                    placeholder="Position"
                />
            </div>
            <div class="col-auto d-flex align-items-center">
                <input
                    type="checkbox"
                    class="form-check-input m-lg-1"
                    id="active"
                    checked
                />
                <label class="form-check-label m-lg-1" for="active">Active</label>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-outline-primary btn-sml m-lg-1">Apply Filter</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EmployeeFilter"
}
</script>

<style scoped>
/* Add any necessary styling */
</style>
