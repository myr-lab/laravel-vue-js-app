import Dashboard from './components/admin/DashboardComponent.vue'
import Category from './components/admin/CategoryComponent.vue'
import Editcat from './components/admin/EditcatComponent.vue'

export const routes = [{
        path: '/dashboard',
        component: Dashboard
    },
    {
        path: '/category',
        component: Category
    },
    {
        path: '/editcategory/:id',
        component: Editcat
    },

]