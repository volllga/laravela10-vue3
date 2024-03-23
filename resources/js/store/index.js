import {createStore} from "vuex";
import Category from '../store/modules/category';
import Employee from "../store/modules/employee.js";
import Invoice from "../store/modules/invoice.js";
import Customer from "../store/modules/customer.js";

const store = createStore({
    modules: {
        Category,
        Employee,
        Invoice,
        Customer,
    }
})

export default store
