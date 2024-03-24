<template>
<!--    <EmployeeFilter></EmployeeFilter>-->
    <div class="container p-5">
    <div>
        <table class="table table-hover" v-if="items !== null">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Number</th>
                <th scope="col">Status</th>
                <th scope="col">Customer</th>
                <th scope="col">Amount</th>
                <th scope="col">VAT rate</th>
                <th scope="col">Date of issue</th>
                <th scope="col">Date of service</th>
                <th scope="col">Due date</th>
                <th scope="col" style="width: 120px">Actions</th>
            </tr>
            </thead>
            <tbody v-if="items && items.length">
            <tr v-for="item in activeItems" :key="item.id">
                <td>
                    <router-link :to="{ name: 'invoice.show', params:{id: item.id}}">
                        {{ item.id }}
                    </router-link>
                </td>
                <td>{{ item.number }}</td>

                <td>
                    <span :class="{'badge rounded-pill text-bg-success': item.status, 'badge rounded-pill text-bg-secondary': !item.status}">
                                {{ item.status ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>{{ item.customer_id }}</td>
                <td>{{ item.amount }}</td>
                <td>{{ item.vat }}</td>
                <td>{{ item.date }}</td>
                <td>{{ item.service_date }}</td>
                <td>{{ item.due_date }}</td>

                <td>
                    <a href="#" class="btn btn-outline-primary btn-sm" @click.prevent="$router.push(`/invoices/${item.id}/edit`)">
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
    name: 'Invoices',
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
            return this.$store.getters.invoices
        },
    },

    mounted() {
        this.fetchInvoices();
    },

    methods: {
        fetchInvoices(filters = null) {
            if (filters) {
                this.$store.dispatch('getFilteredInvoices', filters);
            } else {
                this.$store.dispatch('getInvoices');
            }
        },

        isEdit(id) {
            return this.editItemId === id
        },

        applyFilter(filters) {
            this.fetchInvoices(filters);
        }
    },
}
</script>

