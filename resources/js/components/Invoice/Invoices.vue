<template>
    <!--    <EmployeeFilter></EmployeeFilter>-->
    <div class="container p-5">
        <div>
            <table class="table table-hover" v-if="invoices !== null">
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
                <tbody v-if="invoices && invoices.length">
                <tr v-for="invoice in activeItems" :key="invoice.id">
                    <td>
                        <router-link :to="{ name: 'invoice.show', params:{id: invoice.id}}">
                            {{ invoice.id }}
                        </router-link>
                    </td>
                    <td>{{ invoice.number }}</td>

                    <td>
                    <span
                        :class="{'badge rounded-pill text-bg-success': invoice.status, 'badge rounded-pill text-bg-secondary': !invoice.status}">
                                {{ invoice.status ? 'Active' : 'Inactive' }}
                    </span>
                    </td>
                    <td>{{ formatCompanyName(invoice.customer?.company_name) }}</td>
                    <td>{{ formatAmount(invoice) }}</td>
                    <td>{{ invoice.vat }}</td>
                    <td>{{ invoice.date }}</td>
                    <td>{{ invoice.service_date }}</td>
                    <td>{{ invoice.due_date }}</td>

                    <td>
                        <a href="#" class="btn btn-outline-primary btn-sm"
                           @click.prevent="$router.push(`/invoices/${invoice.id}/edit`)">
                            <EditAction/>
                        </a>
                        <span>&nbsp;</span>
                        <a href="#" class="btn btn-outline-danger btn-sm"
                           @click.prevent="$store.dispatch('destroyInvoice', invoice.id)">
                            <DeleteAction/>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div v-else-if="!invoices">
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
import { mapGetters } from 'vuex';
// import EmployeeFilter from "./EmployeeFilter.vue";

export default {
    name: 'Invoices',
    props: ['invoice'],

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
        ...mapGetters([
            'formatAmount'
            // ... other getters you might want to map
        ]),

        activeItems() {
            return this.invoices
            // .filter((invoice) => invoice.active === true)
        },

        invoices() {
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
        },

        formatCompanyName(name) {
            if (name && name.length > 12) {
                return name.substring(0, 12) + '...';
            }
            return name || '';
        }
    },
}
</script>

