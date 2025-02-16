import { createRouter, createWebHistory } from 'vue-router'
import RegisterForm from '../components/RegisterForm.vue'
import LoginComponent from '../components/LoginComponent.vue'

const routes = [
    { path: '/', redirect: '/Login' },
    { path: '/register', name: 'Register', component: RegisterForm },
    { path: '/login', name: 'Login', component: LoginComponent },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export { router }
