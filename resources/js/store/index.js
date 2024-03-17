import {createStore} from "vuex";
import Category from '../store/modules/category';
import Employee from "../store/modules/employee.js";

const store = createStore({
    modules: {
        Category,
        Employee,
    }

})

export default store
