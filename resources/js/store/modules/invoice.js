import axios from "axios";

export default {
    state: () => ({
        invoice: null,
        invoices: null,

    }),

    getters: {
        invoice: state => state.invoice,
        invoices: state => state.invoices,
    },

    mutations: {
        setInvoice(state, data) {
            state.invoice = data
        },

        setInvoices(state, data) {
            state.invoices = data
        },

    },

    actions: {
        // commit - обращение к mutations, dispatch - actions
        async getInvoices({ commit }) {
            try {
                const resp = await axios.get('api/invoices');
                commit('setInvoices', resp.data.data);
            } catch (error) {
                handleRequestError(error, 'Error fetching items:');
            }
        },

        async getFilteredInvoices({ commit }, filters) {
            try {
                const resp = await axios.get('api/invoices', { params: filters });
                commit('setInvoices', resp.data.data);
            } catch (error) {
                handleRequestError(error, 'Error fetching filtered items:');
            }
        },

        async getInvoice({ commit }, id) {
            try {
                const resp = await axios.get(`/api/invoices/${id}`);
                commit('setInvoice', resp.data.data);
            } catch (error) {
                commit('setInvoice', null);
                handleRequestError(error, 'Error fetching category:');
            }
        },

        async storeInvoice({ dispatch }, data) {
            try {
                await axios.post(`/api/invoices`, {
                    number: data.number,
                    date: data.date,
                    service_date: data.service_date,
                    due_date: data.due_date,
                    amount: data.amount,
                });
                dispatch('getInvoices');
            } catch (error) {
                handleRequestError(error, 'Failed to create category. Please try again.');
            }
        },

        async updateInvoice({}, data) {
            try {
                await axios.patch(`/api/invoices/${data.id}`, {
                    first_name: data.first_name,
                    last_name: data.last_name,
                    position: data.position,
                    email: data.email,
                    active: data.active,
                });
                alert("Invoice updated successfully!");
            } catch (error) {
                handleRequestError(error, 'Failed to update invoice. Please try again.');
            }
        },

        async destroyInvoice({ dispatch }, id) {
            try {
                await axios.delete(`/api/invoices/${id}`, {});
                dispatch('getInvoices');
                alert("Invoice deleted successfully!");
            } catch (error) {
                handleRequestError(error, 'Failed to delete invoice. Please try again.');
            }
        },
    },
}

function handleRequestError(error, defaultMessage) {
    // console.error(error);
    if (error.response && error.response.status === 422) {
        const validationErrors = error.response.data.errors;
        console.error("***", validationErrors);
        alert("Failed to create invoice")
        return validationErrors
    } else {
        alert(defaultMessage);
    }
}
