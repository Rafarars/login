import { createRouter, createWebHistory } from 'vue-router'
import RegisterForm from '../components/RegisterForm.vue'
import LoginComponent from '../components/LoginComponent.vue'
import DashboardComponent from '../components/DashboardComponent.vue';

const routes = [
    { path: '/', redirect: '/Login' },
    { path: '/register', name: 'Register', component: RegisterForm },
    { path: '/login', name: 'Login', component: LoginComponent },
    { path: '/dashboard', name: 'Dashboard', component: DashboardComponent, meta: { requiresAuth: true } },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export { router }
