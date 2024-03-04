import FirstComponent from "./components/FirstComponent.vue";
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
    {
        path: '/categories/:id/edit', component: () => import('./components/Category/CategoryEdit.vue'),
        name: 'category.edit'
    },
    {
        path: '/categories/:id', component: () => import('./components/Category/CategoryShow.vue'),
        name: 'category.show'
    },
]

export default routes
