<template>
    <CreateComponent></CreateComponent>
    <div>
        <table class="table" v-if="items !== null">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Active</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody v-if="items && items.length">
            <template v-for="item in active" :key="item.id">
                <tr>
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.category_name }}</td>
                    <td>{{ item.active }}</td>
                    <td>{{ item.created_at }}</td>
                    <td>
                        <a href="#" class="btn btn-outline-primary btn-sm" @click.prevent="setItemId(item.id)">
                            <EditAction />
                        </a>
                        <span v-if="true">&nbsp;</span>
                        <a href="{{ $deleteRoute }}" class="btn btn-outline-danger btn-sm">
                            <DeleteAction />
                        </a>
                    </td>

                </tr>
                <tr :class="isEdit(item.id) ? '' : 'd-none'">
                    <th scope="row">{{ item.id }}</th>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="checkbox" class="form-check-input">&nbsp Active</td>
                    <td></td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm" @click.prevent="setItemId(null)">Update</a>

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

export default {
    name: 'TableComponent',

    components: {
        CreateComponent,
        EditAction,
        DeleteAction,
    },

    data() {
        return {
            items: [],
            editItemId: null,
        };
    },

    computed: {
        active() {
            return this.items.filter((item) => item.active === 1)
        }
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

        setItemId(id) {
            this.editItemId = id
        },

        isEdit(id) {
            return this.editItemId === id
        }
    },


}

</script>
