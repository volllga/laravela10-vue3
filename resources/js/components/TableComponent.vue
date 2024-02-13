<template>
    <CreateComponent></CreateComponent>
    <div>
        <table class="table table-hover" v-if="items !== null">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Description</th>
                <th scope="col">Active</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col" style="width: 120px">Actions</th>
            </tr>
            </thead>
            <tbody v-if="items && items.length">
            <template v-for="item in activeItems" :key="item.id">
                <tr :class="isEdit(item.id) ? 'd-none' : ''">
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.category_name }}</td>
                    <td>{{ item.category_description }}</td>
                    <td>{{ item.active }}</td>
                    <td>{{ item.created_at }}</td>
                    <td>{{ item.updated_at }}</td>
                    <td>
                        <a href="#" class="btn btn-outline-primary btn-sm" @click.prevent="edit(item.id, item.category_name, item.category_description, item.active)">
                            <EditAction />
                        </a>
                        <span v-if="true">&nbsp;</span>
                        <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="destroy(item.id)">
                            <DeleteAction />
                        </a>
                    </td>

                </tr>
                <tr :class="isEdit(item.id) ? '' : 'd-none'">
                    <th scope="row">{{ item.id }}</th>
                    <td><input type="text"  v-model="categoryName" class="form-control"></td>
                    <td><input type="text"  v-model="categoryDescription" class="form-control" :disabled="!isAllowEdit"></td>
                    <td><input type="checkbox" v-model="active" class="form-check-input" :checked="active">&nbsp Active</td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm" @click.prevent="update(item.id)">Save</a>&nbsp
                        <a href="#" class="btn btn-secondary btn-sm" @click.prevent="closeForm()">
                            <CloseAction />
                        </a>
                    </td>

                </tr>
            </template>
            </tbody>
        </table>
        <div v-else-if="true">
            Loading...
        </div>
        <div v-else>
            No active users found.
        </div>
    </div>
</template>


<script>
import CreateComponent from "@/components/CreateComponent.vue";
import EditAction from "@/components/actions/EditAction.vue";
import DeleteAction from "@/components/actions/DeleteAction.vue";
import CloseAction from "@/components/actions/CloseAction.vue";

export default {
    name: 'TableComponent',

    components: {
        CreateComponent,
        EditAction,
        DeleteAction,
        CloseAction,
    },

    data() {
        return {
            items: [],
            editItemId: null,
            categoryName: '',
            categoryDescription: '',
            active: true,
        };
    },

    computed: {
        activeItems() {
            return this.items.filter((item) => item.active === 1)
        },

        isAllowEdit() {
            return false;
        },
    },

    mounted() {
        this.getItems()
    },

    methods: {
        getItems() {
            axios.get('api/categories')
                .then((response) => {
                    this.items = response.data
                    //console.log(this.items)
                })
                .catch((error) => {
                    console.error('Error fetching items:', error)
                });
        },

        edit(id, name, description, active) {
            this.editItemId = id
            this.categoryName = name
            this.categoryDescription = description
            this.active = active
        },

        update(id) {
            this.editItemId = null
            axios.patch(`api/categories/${id}`, {
                category_name: this.categoryName,
                category_description: this.categoryDescription,
                active: this.active,
            })
                .then((response) => {
                    this.getItems()
                    alert("Category updated successfully!")

                })
                .catch((error) => {
                    console.error(error);

                    if (error.response && error.response.status === 422) {

                        const validationErrors = error.response.data.errors
                        console.error(validationErrors)
                    } else {
                        alert("Failed to update category. Please try again.")
                    }
                });
        },

        destroy(id) {
            this.editItemId = null
            axios.delete(`api/categories/${id}`, {
            })
                .then((response) => {
                    this.getItems()
                    alert("Category deleted successfully!")

                })
                .catch((error) => {
                    console.error(error);

                    if (error.response && error.response.status === 422) {

                        const validationErrors = error.response.data.errors
                        console.error(validationErrors)
                    } else {
                        alert("Failed to delete category. Please try again.")
                    }
                });
        },

        isEdit(id) {
            return this.editItemId === id
        },

        closeForm() {
            this.editItemId = null
        },
    },
}
</script>
