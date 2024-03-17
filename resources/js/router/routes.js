const routes = [
    {
        path: '/home', component: () => import('../components/Home.vue'),
    },
    {
        path: '/first', component: () => import('../components/FirstComponent.vue'),
    },
    {
        path: '/categories', component: () => import('../components/Category/CategoryIndex.vue'),
        name: 'category.index'
    },
    {
        path: '/categories/create', component: () => import('../components/Category/Create.vue'),
        name: 'category.create'
    },
    {
        path: '/categories/:id/edit', component: () => import('../components/Category/CategoryEdit.vue'),
        name: 'category.edit'
    },
    {
        path: '/categories/:id', component: () => import('../components/Category/CategoryShow.vue'),
        name: 'category.show'
    },
    {
        path: '/employees', component: () => import('../components/Employee/Employee.vue'),
        name: 'employee'
    },
    {
        path: '/employees/create', component: () => import('../components/Employee/CreateEmployee.vue'),
        name: 'employee.create'
    },
]

export default routes
