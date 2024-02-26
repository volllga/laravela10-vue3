import FirstComponent from "./components/FirstComponent.vue";
import Categories from "./components/Categories.vue";
import Home from "./components/Home.vue";



const routes = [
    {
        path: '/home', component: Home
    },
    {
        path: '/first', component: FirstComponent
    },
    {
        path: '/categories', component: () => import('./components/Category/Index.vue'),
        name: 'category.index'
    },
    {
        path: '/categories/create', component: () => import('./components/Category/Create.vue'),
        name: 'category.create'
    },
]

export default routes
