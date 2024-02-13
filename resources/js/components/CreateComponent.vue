<template>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Category</div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name *</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="categoryName"
                                id="category_name"
                                placeholder="Category Name, max: 25"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="category_description" class="form-label">Category Description</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="categoryDescription"
                                id="category_description"
                                placeholder="Category Description"
                                :disabled="!isAllowEdit"
                            />
                        </div>

                        <div class="mb-3 form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                v-model="active"
                                id="active"
                                checked
                            />

                            <label class="form-check-label" for="active">Active</label>
                        </div>

                        <button @click.prevent="create" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateComponent",

    data() {
        return {
            categoryName: '',
            categoryDescription: '',
            active: true,
        }
    },

    computed: {

        isAllowEdit() {
            return false;
        },
    },

    methods: {
        create() {
            axios.post("api/categories", {
                category_name: this.categoryName,
                category_description: this.categoryDescription,
                active: this.active,
            })
                .then((response) => {
                    this.categoryName = null;
                    this.categoryDescription = null;
                    this.active = true;

                    alert("Category created successfully!");
                })
                .catch((error) => {
                    console.error(error);

                    if (error.response && error.response.status === 422) {

                        const validationErrors = error.response.data.errors;
                        console.error(validationErrors);
                    } else {
                        alert("Failed to create category. Please try again.");
                    }
                });
        },
    },
}
</script>

<style scoped>

</style>
