import axios from "axios";
import router from "../../router/router.js";

export default {
    state: () => ({
        category: null,
        categories: null,
        description: true,
    }),

    getters: {
        category: state => state.category,
        categories: state => state.categories,
        description: state => state.description,
    },

    mutations: {
        setCategory(state, data) {
            state.category = data
        },

        setCategories(state, data) {
            state.categories = data
        },

        setDescription(state, data) {
            state.description = data
        },
    },

    actions: {
        // commit - обращение к mutations, dispatch - actions
        async getItems({ commit }) {
            try {
                const resp = await axios.get('api/categories');
                commit('setCategories', resp.data.data);
            } catch (error) {
                handleRequestError(error, 'Error fetching items:');
            }
        },

        async getCategory({ commit }, id) {
            try {
                const resp = await axios.get(`/api/categories/${id}`);
                commit('setCategory', resp.data.data);
            } catch (error) {
                commit('setCategory', null);
                handleRequestError(error, 'Error fetching category:');
            }
        },

        async store({ dispatch }, data) {
            try {
                await axios.post(`api/categories`, {
                    category_name: data.category_name,
                    category_description: data.category_description,
                    active: data.active,
                });
                dispatch('getItems');
            } catch (error) {
                handleRequestError(error, 'Failed to create category. Please try again.');
            }
        },

        async update({}, data) {
            try {
                await axios.patch(`/api/categories/${data.id}`, {
                    category_name: data.category_name,
                    category_description: data.category_description,
                    active: data.active,
                });
                router.push({name: 'category.show', params: {id: data.id}});
                alert("Category updated successfully!");
            } catch (error) {
                handleRequestError(error, 'Failed to update category. Please try again.');
            }
        },

        async destroy({ dispatch }, id) {
            try {
                await axios.delete(`api/categories/${id}`, {});
                dispatch('getItems');
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
