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
                                :disabled="!isAllowEditDescription"
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

                        <button
                            :disabled="!isDisabled"
                            @click.prevent="store"
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

import axios from 'axios'

export default {
    name: "Create",



    data() {
        return {
            validationErrors: null,
            categoryName: '',
            categoryDescription: '',
            active: true,
        }
    },

    computed: {
        isDisabled()
        {
            return this.categoryName.trim()
        },

        isAllowEditDescription() {
            return this.$store.getters.description
        }
    },

    methods: {
        store() {
            axios.post(`api/categories`, {
                category_name: this.categoryName,
                category_description: this.categoryDescription,
                active: this.active,
            })
                .then(() => {
                    this.categoryName = ''
                    this.categoryDescription = ''
                    this.active = true
                    this.$store.dispatch('getItems')

                })
                .catch((error) => {
                    console.error(error);

                    if (error.response && error.response.status === 422) {
                        this.validationErrors = error.response.data.errors;
                    } else {
                        alert("Failed to create category. Please try again.")
                    }
                })
        },

    },
}
</script>

<style scoped>

</style>
