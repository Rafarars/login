<template>
    <div class="min-h-screen bg-gray-500 flex items-center justify-center p-4">
        <div class="bg-gray-100 rounded-lg shadow-lg w-full max-w-md p-6">
            <div class="text-center mb-8">
                <img
                    :src="'https://static.vecteezy.com/system/resources/previews/008/997/710/non_2x/udo-logo-udo-letter-udo-letter-logo-design-initials-udo-logo-linked-with-circle-and-uppercase-monogram-logo-udo-typography-for-technology-business-and-real-estate-brand-vector.jpg'"
                    alt="Facebook Logo"
                    class="h-16 mx-auto mb-4 animate-pulse rounded-full"
                />
            </div>

            <form @submit.prevent="handleLogin" class="space-y-4">
                <div>
                    <input
                        v-model="form.email"
                        type="email"
                        placeholder="Correo electrónico"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black"
                        :class="{ 'border-red-500': errors.email }"
                    />
                    <span v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</span>
                </div>

                <div class="relative">
                    <input
                        v-model="form.password"
                        :type="showPassword ? 'text' : 'password'"
                        placeholder="Contraseña"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-black"
                        :class="{ 'border-red-500': errors.password }"
                    />
                    <span v-if="errors.password" class="text-red-500 text-sm">{{ errors.password }}</span>
                    <button
                        type="button"
                        @click="togglePasswordVisibility"
                        class="absolute inset-y-0 right-0 px-3 flex items-center"
                    >
                        <i :class="showPassword ? 'bi bi-eye' : 'bi bi-eye-slash'" class="text-gray-500 hover:text-gray-700"></i>
                    </button>
                </div>

                <button
                    type="submit"
                    class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg transition duration-200"
                    :disabled="loading"
                >
                    {{ loading ? 'Iniciando sesión...' : 'Iniciar sesión' }}
                </button>

                <div class="text-center">
                    <a href="#" class="text-blue-500 hover:underline text-sm">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <hr class="my-4" />

                <div class="text-center">
                    <router-link
                        to="/register"
                        class="inline-block py-2 px-4 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200"
                    >
                        Crear cuenta nueva
                    </router-link>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const loading = ref(false)
const errors = ref({})
const showPassword = ref(false)

const togglePasswordVisibility = () => {
    showPassword.value = !showPassword.value
}

const form = ref({
    email: '',
    password: ''
})

const handleLogin = async () => {
    loading.value = true
    errors.value = {}

    try {
        const response = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(form.value)
        })

        const data = await response.json()

        if (!response.ok) {
            errors.value = data.errors
            throw new Error(data.message)
        }

        // Store the token
        localStorage.setItem('token', data.token)

        // Redirect to dashboard or home page
        router.push('/dashboard')
    } catch (error) {
        console.error('Login error:', error)
    } finally {
        loading.value = false
    }
}
</script>
