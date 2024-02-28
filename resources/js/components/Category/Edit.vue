<template>

    <tr :class="this.$parent.isEdit(item.id) ? '' : 'd-none'">
        <th scope="row">{{ item.id }}</th>
        <td><input type="text" v-model="categoryName" class="form-control mw-100"></td>
        <td><input type="text" v-model="categoryDescription" class="form-control"
                   :disabled="!this.$parent.$parent.isAllowEditDescription">
        </td>
        <td><input type="checkbox" v-model="active" class="form-check-input" :checked="active">&nbsp Active</td>
        <td></td>
        <td></td>
        <td>
            <a href="#" class="btn btn-success btn-sm" @click.prevent="update(item.id)">Save</a>&nbsp
            <a href="#" class="btn btn-secondary btn-sm" @click.prevent="closeForm()">
                <CloseAction/>
            </a>
        </td>
    </tr>

</template>


<script>
import axios from 'axios';
import CloseAction from "../actions/CloseAction.vue";

export default {
    name: 'Edit',

    components: {
        CloseAction,
    },

    props: [
        'item'
    ],

    data() {
        return {
            // editItemId: null,
            categoryName: '',
            categoryDescription: '',
            active: true,
        };
    },


    mounted() {

    },

    methods: {

        update(id) {
            this.$parent.editItemId = null
            axios.patch(`api/categories/${id}`, {
                category_name: this.categoryName,
                category_description: this.categoryDescription,
                active: this.active,
            })
                .then((response) => {
                    this.$parent.getItems()
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

        closeForm() {
            this.$parent.editItemId = null
        },
    },
}
</script>
