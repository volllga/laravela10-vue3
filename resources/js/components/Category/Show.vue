<template>
    <tr :class="$parent.isEdit(item.id) ? 'd-none' : ''">
        <th scope="row"><router-link :to="{ name: 'category.show', params:{id: item.id}}">{{ item.id }}</router-link></th>
        <td>{{ item.category_name }}</td>
        <td>{{ item.category_description }}</td>
        <td>{{ item.active }}</td>
        <td>{{ item.created_at }}</td>
        <td>{{ item.updated_at }}</td>
        <td>
            <a href="#" class="btn btn-outline-primary btn-sm" @click.prevent="edit(item)">
                <EditAction/>
            </a>
            <span>&nbsp;</span>
            <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="$store.dispatch('destroy', item.id)">
                <DeleteAction/>
            </a>
        </td>
    </tr>
</template>

<script>
import EditAction from "@/components/actions/EditAction.vue";
import DeleteAction from "@/components/actions/DeleteAction.vue";

export default {
    name: 'Show',
    components: {
        EditAction,
        DeleteAction,
    },
    props: ['item'],
    methods: {
        edit(item) {
            this.$parent.editItemId = item.id;
            const editComponent = this.$parent.$refs[`${item.id}`][0];
            if (editComponent) {
                Object.assign(editComponent, {
                    categoryName: item.category_name,
                    categoryDescription: item.category_description,
                    active: item.active
                });
            } else {
                console.error(`Child component with id ${item.id} not found.`);
            }
        },
    },
}
</script>
