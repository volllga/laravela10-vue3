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
        path: '/categories/:id/edit', component: () => import('./components/Category/Edit1.vue'),
        name: 'category.edit'
    },
    {
        path: '/categories/show', component: () => import('./components/Category/Show1.vue'),
        name: 'category.show'
    },
]

export default routes
