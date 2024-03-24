const routes = [
    {
        path: '/home', component: () => import('../components/Home.vue'),
    },
    {
        path: '/customers', component: () => import('../components/Customer/Customer.vue'),
        name: 'customer'
    },
    {
        path: '/customers/create', component: () => import('../components/Customer/CustomerCreate.vue'),
        name: 'customer.create'
    },
    {
        path: '/customers/:id', component: () => import('../components/Customer/CustomerShow.vue'),
        name: 'customer.show'
    },
    {
        path: '/customers/:id/edit', component: () => import('../components/Customer/CustomerEdit.vue'),
        name: 'customer.edit'
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
        path: '/employees/create', component: () => import('../components/Employee/EmployeeCreate.vue'),
        name: 'employee.create'
    },
    {
        path: '/employees/:id', component: () => import('../components/Employee/EmployeeShow.vue'),
        name: 'employee.show'
    },
    {
        path: '/employees/:id/edit', component: () => import('../components/Employee/EmployeeEdit.vue'),
        name: 'employee.edit'
    },
    {
        path: '/invoices', component: () => import('../components/Invoice/Invoice.vue'),
        name: 'invoice'
    },
    {
        path: '/invoices/create', component: () => import('../components/Invoice/InvoiceCreate.vue'),
        name: 'invoice.create'
    },
    {
        path: '/invoices/:id', component: () => import('../components/Invoice/InvoiceShow.vue'),
        name: 'invoice.show'
    },
    {
        path: '/invoices/:id/edit', component: () => import('../components/Invoice/InvoiceEdit.vue'),
        name: 'invoice.edit'
    },
]

export default routes
