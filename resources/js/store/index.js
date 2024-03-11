import {createStore} from "vuex";
import Category from '../store/modules/category'

const store = createStore({
    modules: {
        Category,
    }

})

export default store
