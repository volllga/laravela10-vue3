export default {
    state: () => ({
        category: null,
    }),

    getters: {
        category: state => state.category,
    },

    mutations: {
        setCategory(state, data) {
            state.category = data
            state.loading = false
        },
    },

    actions: {
        // commit - обращение к mutations, dispatch - actions
        getItem({ state, commit, dispatch }, id) {
            axios.get(`/api/categories/${id}`)
                .then(res => {
                    commit('setCategory', res.data.data)
                })
                .catch(error => {
                    commit('setCategory', null)
                    console.error('Error fetching category:', error)
                })
        },
    },
}
