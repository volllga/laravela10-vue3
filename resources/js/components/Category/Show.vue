<template>

    <tr :class="this.$parent.isEdit(item.id) ? 'd-none' : ''">
        <th scope="row">{{ item.id }}</th>
        <td>{{ item.category_name }}</td>
        <td>{{ item.category_description }}</td>
        <td>{{ item.active }}</td>
        <td>{{ item.created_at }}</td>
        <td>{{ item.updated_at }}</td>
        <td>
            <a href="#" class="btn btn-outline-primary btn-sm"
               @click.prevent="edit(item.id, item.category_name, item.category_description, item.active)">
                <EditAction/>
            </a>
            <span v-if="true">&nbsp;</span>
            <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="destroy(item.id)">
                <DeleteAction/>
            </a>
        </td>

    </tr>

</template>


<script>
import axios from 'axios';
import EditAction from "@/components/actions/EditAction.vue";
import DeleteAction from "@/components/actions/DeleteAction.vue";


export default {
    name: 'Show',

    components: {
        EditAction,
        DeleteAction,

    },

    data() {
        return {}
    },

    props: [
        'item'
    ],

    computed: {
    },

    mounted() {

    },

    methods: {

        edit(id, name, description, active) {

            this.$parent.editItemId = id;
            const editComponent = this.$parent.$refs[`${id}`][0];
            if (editComponent) {
                Object.assign(editComponent, {
                    categoryName: name,
                    categoryDescription: description,
                    active: active
                });
            } else {
                console.error(`Child component with id ${id} not found.`);
            }
        },


        destroy(id) {
            this.$parent.editItemId = null
            axios.delete(`api/categories/${id}`, {})
                .then((response) => {
                    this.$parent.getItems()
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

    },
}
</script>
