import axios from "axios";

export default {
    state: () => ({
        invoice: null,
        invoices: null,

    }),

    getters: {
        invoice: state => state.invoice,
        invoices: state => state.invoices,
        formatAmount: (invoice) => (invoice) => {
            let symbol = '';
            switch (invoice.currency) {
                case 'usd':
                    symbol = '$ ';
                    break;
                case 'eur':
                    symbol = '€ ';
                    break;
                case 'pln':
                    symbol = 'zł ';
                    break;
            }
            const formattedAmount = new Intl.NumberFormat('en-US', { style: 'decimal', minimumFractionDigits: 2 }).format(invoice.amount);
            return symbol + formattedAmount;
        }

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
        async getInvoices({ commit })
            {
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
                    customer_id: data.customer_id,
                    date: data.date,
                    service_date: data.service_date,
                    due_date: data.due_date,
                    amount: data.amount,
                    currency: data.currency,

                });
                dispatch('getInvoices');
            } catch (error) {
                handleRequestError(error, 'Failed to create category. Please try again.');
            }
        },

        async updateInvoice({}, data) {
            try {
                await axios.patch(`/api/invoices/${data.id}`, {
                    number: data.number,
                    date: data.date,
                    customer_id: data.customer_id,
                    service_date: data.service_date,
                    due_date: data.due_date,
                    amount: data.amount,
                    currency: data.currency,
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
