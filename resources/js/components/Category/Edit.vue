<template>

    <tr :class="this.$parent.isEdit(item.id) ? '' : 'd-none'">
        <th scope="row">{{ item.id }}</th>
        <td><input type="text" v-model="categoryName" class="form-control mw-100" name="categoryName"></td>
        <td><input type="text" v-model="categoryDescription" class="form-control"
                   :disabled="!isAllowEditDescription" name="categoryDescription">
        </td>
        <td><input type="checkbox" v-model="active" class="form-check-input" name="active">&nbsp Active</td>
        <td></td>
        <td></td>
        <td>
            <a class="btn btn-success btn-sm" @click.prevent="update(item.id)">Save</a>&nbsp
            <a class="btn btn-secondary btn-sm" @click.prevent="closeForm()">
                <CloseAction/>
            </a>
        </td>
    </tr>

</template>


<script>
import CloseAction from "../actions/CloseAction.vue";

export default {
    name: 'Edit',

    components: {
        CloseAction,
    },

    props: {
        item: {
            type: Object,
            required: true
        }
    },

    data() {
        return {
            categoryName: '',
            categoryDescription: '',
            active: true,
        };
    },

    computed: {
        isAllowEditDescription() {
            return this.$store.getters.description
        }
    },

    methods: {
        update() {
            const updatedItem = {
                id: this.item.id,
                category_name: this.categoryName,
                category_description: this.categoryDescription,
                active: this.active
            };

            this.$store.dispatch('update', updatedItem);
            this.closeForm();
            this.$store.dispatch('getItems');
        },

        closeForm() {
            this.$parent.editItemId = null;
        }
    },
}
</script>
