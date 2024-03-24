<template>
<!--    <EmployeeFilter></EmployeeFilter>-->
    <div class="container p-5">
    <div>
        <table class="table table-hover" v-if="items !== null">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Company Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Country</th>
                <th scope="col">Phone</th>
                <th scope="col">Tax Identifier</th>
                <th scope="col">Created At</th>
                <th scope="col" style="width: 120px">Actions</th>
            </tr>
            </thead>
            <tbody v-if="items && items.length">
            <tr v-for="item in activeItems" :key="item.id">
                <td>
                    <router-link :to="{ name: 'customer.show', params:{id: item.id}}">
                        {{ item.id }}
                    </router-link>
                </td>
                <td>{{ item.company_name }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.address }}</td>
                <td>{{ item.city }}</td>
                <td>{{ item.country }}</td>
                <td>{{ item.phone }}</td>
                <td>{{ item.tax_identifier }}</td>
                <td>{{ item.created_at }}</td>

                <td>
                    <a href="#" class="btn btn-outline-primary btn-sm" @click.prevent="$router.push(`/customers/${item.id}/edit`)">
                        <EditAction/>
                    </a>
                    <span>&nbsp;</span>
                    <a href="#" class="btn btn-outline-danger btn-sm" @click.prevent="$store.dispatch('destroyInvoice', item.id)">
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
// import EmployeeFilter from "./EmployeeFilter.vue";

export default {
    name: 'Customers',
    props: ['item'],

    components: {
        // EmployeeFilter,
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
            return this.$store.getters.customers
        },
    },

    mounted() {
        this.fetchCustomers();
    },

    methods: {
        fetchCustomers(filters = null) {
            if (filters) {
                this.$store.dispatch('getFilteredCustomers', filters);
            } else {
                this.$store.dispatch('getCustomers');
            }
        },

        isEdit(id) {
            return this.editItemId === id
        },

        applyFilter(filters) {
            this.fetchCustomers(filters);
        }
    },
}
</script>

