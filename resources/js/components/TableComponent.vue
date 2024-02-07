<template>
    <div>
        <table class="table" v-if="users !== null">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Position</th>
                <th scope="col">Active</th>
            </tr>
            </thead>
            <tbody v-if="users && users.length">
            <template v-for="user in activeUsers" :key="user.id">
                <tr>
                    <th scope="row">{{ user.id }}</th>
                    <td>{{ user.name }}</td>
                    <td>{{ user.age }}</td>
                    <td>{{ user.position }}</td>
                    <td>{{ user.active }}</td>
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

export default {
    name: 'TableComponent',

    components: {},

    data() {
        return {
            users: [],
        };
    },

    computed: {
        activeUsers() {
            return this.users.filter((user) => user.active === 1);
        }
    },

    mounted() {
        this.getUsers()
    },

    methods: {
        getUsers() {
            axios.get('users')
                .then((response) => {
                    this.users = response.data;
                    console.log(this.users);
                })
                .catch((error) => {
                    console.error('Error fetching users:', error);
                });
        }
    }
}

</script>
