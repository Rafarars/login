// resources/js/router.js
import { createRouter, createWebHistory } from 'vue-router'
import RegisterForm from '../components/RegisterForm.vue'

// Si visitas "/" pero solo tienes definida la ruta "/register", es posible que no se muestre nada.
// Una solución es redirigir "/" a "/register".
const routes = [
    { path: '/', redirect: '/register' },
    { path: '/register', name: 'Register', component: RegisterForm },
    // Puedes agregar otras rutas aquí, por ejemplo el login
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export { router }
