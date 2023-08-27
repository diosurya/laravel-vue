import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/',
        name: 'customer.index',
        component: () => import('../views/customer/Index.vue')
    },
    {
        path: '/add',
        name: 'customer.add',
        component: () => import('../views/customer/Create.vue')
    },
    {
        path: '/edit/:id',
        name: 'customer.edit',
        component: () => import('../views/customer/Edit.vue')
    },
    {
        path: '/detail/:id',
        name: 'customer.detail',
        component: () => import('../views/customer/Detail.vue')
    },
    {
        path: '/datatable',
        name: 'customer.datatable',
        component: () => import('../views/customer/Datatable.vue')
    },

    {
        path: '/akun',
        name: 'akun.index',
        component: () => import('../views/akun/Index.vue')
    },
    {
        path: '/akun/add',
        name: 'akun.add',
        component: () => import('../views/akun/Create.vue')
    },
    {
        path: '/transactions/transfer',
        name: 'transactions.transfer',
        component: () => import('../views/transactions/Transfer.vue')
    },
    {
        path: '/transactions/mutations',
        name: 'transactions.mutations',
        component: () => import('../views/transactions/Mutations.vue')
    },
    {
        path: '/task',
        name: 'task.index',
        component: () => import('../views/task/Index.vue')
    },
    {
        path: '/landing',
        name: 'landing.index',
        component: () => import('../views/landing/Index.vue')
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;