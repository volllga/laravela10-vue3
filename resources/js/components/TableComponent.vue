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
            </tr>
            </thead>
            <tbody v-if="items && items.length">
            <template v-for="item in active" :key="item.id">
                <tr>
                    <th scope="row">{{ item.id }}</th>
                    <td>{{ item.category_name }}</td>
                    <td>{{ item.active }}</td>
                    <td>{{ item.created_at }}</td>
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

export default {
    name: 'TableComponent',

    components: {
        CreateComponent,
    },

    data() {
        return {
            items: [],
        };
    },

    computed: {
        active() {
            return this.items.filter((item) => item.active === 1);
        }
    },

    mounted() {
        this.getItems()
    },

    methods: {
        getItems() {
            axios.get('api/categories')
                .then((response) => {
                    this.items = response.data;
                    //console.log(this.items);
                })
                .catch((error) => {
                    console.error('Error fetching items:', error);
                });
        }
    }
}

</script>
