import axios from "axios";

export default {
    state: () => ({
        customer: null,
        customers: null,

    }),

    getters: {
        customer: state => state.customer,
        customers: state => state.customers,
    },

    mutations: {
        setCustomer(state, data) {
            state.customer = data
        },

        setCustomers(state, data) {
            state.customers = data
        },

    },

    actions: {
        // commit - обращение к mutations, dispatch - actions
        async getCustomers({ commit }) {
            try {
                const resp = await axios.get('api/customers');
                commit('setCustomers', resp.data.data);
            } catch (error) {
                handleRequestError(error, 'Error fetching items:');
            }
        },

        async getFilteredCustomers({ commit }, filters) {
            try {
                const resp = await axios.get('api/customers', { params: filters });
                commit('setCustomers', resp.data.data);
            } catch (error) {
                handleRequestError(error, 'Error fetching filtered items:');
            }
        },

        async getCustomer({ commit }, id) {
            try {
                const resp = await axios.get(`/api/customers/${id}`);
                commit('setCustomer', resp.data.data);
            } catch (error) {
                commit('setCustomer', null);
                handleRequestError(error, 'Error fetching category:');
            }
        },

        async storeCustomer({ dispatch }, data) {
            try {
                await axios.post(`/api/customers`, {
                    number: data.number,
                    date: data.date,
                    service_date: data.service_date,
                    due_date: data.due_date,
                    amount: data.amount,
                    company_name: data.company_name,
                    email: data.email,
                    address: data.address,
                    city: data.city,
                    country: data.country,
                    phone: data.phone,
                    tax_identifier: data.tax_identifier,
                });
                dispatch('getCustomers');
            } catch (error) {
                handleRequestError(error, 'Failed to create customer. Store message.');
            }
        },

        async updateCustomer({}, data) {
            try {
                await axios.patch(`/api/customers/${data.id}`, {
                    first_name: data.first_name,
                    last_name: data.last_name,
                    position: data.position,
                    email: data.email,
                    active: data.active,
                });
                alert("Invoice updated successfully!");
            } catch (error) {
                handleRequestError(error, 'Failed to update customer. Please try again.');
            }
        },

        async destroyInvoice({ dispatch }, id) {
            try {
                await axios.delete(`/api/customers/${id}`, {});
                dispatch('getCustomers');
                alert("Invoice deleted successfully!");
            } catch (error) {
                handleRequestError(error, 'Failed to delete customer. Please try again.');
            }
        },
    },
}

function handleRequestError(error, defaultMessage) {
    // console.error(error);
    if (error.response && error.response.status === 422) {
        const validationErrors = error.response.data.errors;
        console.error("***", validationErrors);
        alert("Failed to create customer")
        return validationErrors
    } else {
        alert(defaultMessage);
    }
}
