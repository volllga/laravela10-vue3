<template>
    <div class="container p-5">
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
                <Show :item="item" ></Show>
                <Edit :item="item" :ref="`${item.id}`"></Edit>
            </template>
            </tbody>
        </table>
        <div v-else-if="!items">
            Loading...
        </div>
        <div v-else>
            No active users found.
        </div>
    </div>
    </div>
</template>


<script>
import Create from "@/components/Category/Create.vue";
import EditAction from "@/components/actions/EditAction.vue";
import DeleteAction from "@/components/actions/DeleteAction.vue";
import Edit from "@/components/Category/Edit.vue";
import Show from "@/components/Category/Show.vue";

export default {
    name: 'Categories',

    components: {
        Create,
        EditAction,
        DeleteAction,
        Edit,
        Show
    },

    data() {
        return {
            editItemId: null,
        };
    },

    computed: {
        activeItems() {
            return this.items
                // .filter((item) => item.active === true)
        },

        items() {
            return this.$store.getters.categories
        },
    },

    mounted() {
        this.$store.dispatch('getItems')
    },

    methods: {
        isEdit(id) {
            return this.editItemId === id
        },
    },
}
</script>
