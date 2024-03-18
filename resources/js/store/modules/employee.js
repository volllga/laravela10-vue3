import axios from "axios";

export default {
    state: () => ({
        employee: null,
        employees: null,
        description: true,
    }),

    getters: {
        employee: state => state.employee,
        employees: state => state.employees,
    },

    mutations: {
        setEmployee(state, data) {
            state.employee = data
        },

        setEmployees(state, data) {
            state.employees = data
        },

    },

    actions: {
        // commit - обращение к mutations, dispatch - actions
        async getEmployees({ commit }) {
            try {
                const resp = await axios.get('api/employees');
                commit('setEmployees', resp.data.data);
            } catch (error) {
                handleRequestError(error, 'Error fetching items:');
            }
        },

        async getEmployee({ commit }, id) {
            try {
                const resp = await axios.get(`/api/employees/${id}`);
                commit('setEmployee', resp.data.data);
            } catch (error) {
                commit('setEmployee', null);
                handleRequestError(error, 'Error fetching category:');
            }
        },

        async storeEmployee({ dispatch }, data) {
            try {
                await axios.post(`/api/employees`, {
                    first_name: data.first_name,
                    last_name: data.last_name,
                    position: data.position,
                    email: data.email,
                    active: data.active,
                });
                dispatch('getEmployees');
            } catch (error) {
                handleRequestError(error, 'Failed to create category. Please try again.');
            }
        },

        async updateEmployee({}, data) {
            try {
                await axios.patch(`/api/employees/${data.id}`, {
                    first_name: data.first_name,
                    last_name: data.last_name,
                    position: data.position,
                    email: data.email,
                    active: data.active,
                });
                alert("Employee updated successfully!");
            } catch (error) {
                handleRequestError(error, 'Failed to update employee. Please try again.');
            }
        },

        async destroyEmployee({ dispatch }, id) {
            try {
                await axios.delete(`/api/employees/${id}`, {});
                dispatch('getEmployees');
                alert("Category deleted successfully!");
            } catch (error) {
                handleRequestError(error, 'Failed to delete category. Please try again.');
            }
        },
    },
}

function handleRequestError(error, defaultMessage) {
    console.error(error);
    if (error.response && error.response.status === 422) {
        const validationErrors = error.response.data.errors;
        console.error(validationErrors);
    } else {
        alert(defaultMessage);
    }
}
