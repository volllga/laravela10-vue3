import axios from "axios";

export default {
    state: () => ({
        category: null,
        categories: null,
        description: false,
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
        getItems({ commit }) {
            axios.get('api/categories')
                .then((resp) => {
                    commit('setCategories', resp.data.data)
                })
                .catch((error) => {
                    console.error('Error fetching items:', error)
                });
        },

        getItem({ commit }, id) {
            axios.get(`/api/categories/${id}`)
                .then(resp => {
                    commit('setCategory', resp.data.data)
                })
                .catch(error => {
                    commit('setCategory', null)
                    console.error('Error fetching category:', error)
                })
        },


        destroy({ dispatch }, id) {
            axios.delete(`api/categories/${id}`, {})
                .then(() => {
                    dispatch('getItems')
                    alert("Category deleted successfully!")

                })
                .catch((error) => {
                    console.error(error);

                    if (error.response && error.response.status === 422) {
                        const validationErrors = error.response.data.errors
                        console.error(validationErrors)
                    } else {
                        alert("Failed to delete category. Please try again.")
                    }
                });
        },
    },
}
