<template>
    <div class="container p-5">
    <div>
        <table class="table table-hover" v-if="items !== null">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Employee</th>
                <th scope="col">Active</th>
                <th scope="col">Position</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
                <th scope="col" style="width: 120px">Actions</th>
            </tr>
            </thead>
            <tbody v-if="items && items.length">
            <tr v-for="item in activeItems" :key="item.id">
                <td>
                    <router-link :to="{ name: 'employee.show', params:{id: item.id}}">
                        {{ item.id }}
                    </router-link>
                </td>
                <td>{{ item.first_name + ' ' + item.last_name}}</td>
                <td>
                    <span :class="{'badge rounded-pill text-bg-success': item.active, 'badge rounded-pill text-bg-secondary': !item.active}">
                                {{ item.active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>{{ item.position }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.created_at }}</td>
                <td>
                    <a href="#" class="btn btn-outline-primary btn-sm" @click.prevent="$router.push(`/employees/${item.id}/edit`)">
                        <EditAction/>
                    </a>
                    <span>&nbsp;</span>
                    <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="$store.dispatch('destroyEmployee', item.id)">
                        <DeleteAction/>
                    </a>
                </td>
            </tr>
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

import EditAction from "../actions/EditAction.vue";
import DeleteAction from "../actions/DeleteAction.vue";

export default {
    name: 'Employees',
    props: ['item'],

    components: {

        EditAction,
        DeleteAction,
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
            return this.$store.getters.employees
        },
    },

    mounted() {
        this.$store.dispatch('getEmployees')
    },

    methods: {
        isEdit(id) {
            return this.editItemId === id
        },
    },
}
</script>
