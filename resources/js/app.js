import './bootstrap';
import { createApp } from 'vue';
import LoginComponent from '../components/LoginComponent.vue';
import App from './App.vue'
import { router } from './router'

createApp(LoginComponent).mount('#app');

const app = createApp(App)

app.use(router)
app.mount('#app')
