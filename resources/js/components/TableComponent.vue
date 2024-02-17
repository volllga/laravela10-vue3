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
                <ShowComponent :item="item" ></ShowComponent>
                <EditComponent :item="item" :ref="`${item.id}`"></EditComponent>
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
import axios from 'axios';
import CreateComponent from "@/components/CreateComponent.vue";
import EditAction from "@/components/actions/EditAction.vue";
import DeleteAction from "@/components/actions/DeleteAction.vue";
import EditComponent from "@/components/EditComponent.vue";
import ShowComponent from "@/components/ShowComponent.vue";

export default {
    name: 'TableComponent',

    components: {
        CreateComponent,
        EditAction,
        DeleteAction,
        EditComponent,
        ShowComponent
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

        isEdit(id) {
            return this.editItemId === id
        },
    },
}
</script>
