<template>
    <div class="min-h-screen bg-gray-500 flex items-center justify-center p-4">
        <div class="bg-gray-100 rounded-lg shadow-lg w-full max-w-md p-6">
            <div class="text-center mb-8">
                <img
                    :src="'https://img.freepik.com/vector-premium/logotipo-udo-udo-letra-udo-letra-diseno-logotipo-iniciales-logotipo-udo-vinculado-circulo-mayuscula-monograma-logotipo-udo-tipografia-negocios-tecnologicos-marca-inmobiliaria_229120-78721.jpg?w=360'"
                    alt="Udo logo"
                    class="h-24 mx-auto mb-4 animate-pulse rounded-full"
                />
                <h2 class="text-2xl font-bold text-black">Crear una cuenta</h2>
                <p class="text-gray-600">Es rápido y fácil</p>
            </div>

            <form @submit.prevent="handleRegister" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input
                            v-model="form.firstName"
                            type="text"
                            placeholder="Nombre"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 bg-white text-black"
                            :class="{ 'border-red-500': errors.firstName }"
                        />
                        <span v-if="errors.firstName" class="text-red-500 text-sm">{{ errors.firstName }}</span>
                    </div>
                    <div>
                        <input
                            v-model="form.lastName"
                            type="text"
                            placeholder="Apellido"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 bg-white text-black"
                            :class="{ 'border-red-500': errors.lastName }"
                        />
                        <span v-if="errors.lastName" class="text-red-500 text-sm">{{ errors.lastName }}</span>
                    </div>
                </div>

                <div>
                    <input
                        v-model="form.email"
                        type="email"
                        placeholder="Correo electrónico"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 bg-white text-black"
                        :class="{ 'border-red-500': errors.email }"
                    />
                    <span v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</span>
                </div>

                <div class="relative">
                    <input
                        v-model="form.password"
                        :type="showPassword ? 'text' : 'password'"
                        placeholder="Contraseña nueva"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 bg-white text-black"
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

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Fecha de nacimiento</label>
                    <div class="grid grid-cols-3 gap-4">
                        <select
                            v-model="form.day"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none text-black focus:ring-2 focus:ring-purple-300 bg-white"
                        >
                            <option v-for="day in 31" :key="day" :value="day">{{ day }}</option>
                        </select>
                        <select
                            v-model="form.month"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none text-black focus:ring-2 focus:ring-purple-300 bg-white"
                        >
                            <option v-for="(month, index) in months" :key="index" :value="index + 1">
                                {{ month }}
                            </option>
                        </select>
                        <select
                            v-model="form.year"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none text-black focus:ring-2 focus:ring-purple-300 bg-white"
                        >
                            <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm text-gray-600">Género</label>
                    <div class="grid grid-cols-3 gap-4">
                        <label class="flex items-center justify-between px-3 py-2 border rounded-lg focus:ring-purple-300 bg-white text-black">
                            <span>Mujer</span>
                            <input type="radio" v-model="form.gender" value="female" class="form-radio custom-radio" />
                        </label>
                        <label class="flex items-center justify-between px-3 py-2 border rounded-lg focus:ring-purple-300 bg-white text-black">
                            <span>Hombre</span>
                            <input type="radio" v-model="form.gender" value="male"  class="form-radio custom-radio" />
                        </label>
                        <label class="flex items-center justify-between px-3 py-2 border rounded-lg focus:ring-purple-300 bg-white text-black">
                            <span>Otros</span>
                            <input type="radio" v-model="form.gender" value="custom"  class="form-radio custom-radio" />
                        </label>
                    </div>
                </div>

                <p class="text-xs text-gray-500">
                    Al hacer clic en "Registrarte", aceptas nuestras Condiciones, la Política de privacidad y la Política de cookies.
                </p>

                <button
                    type="submit"
                    class="w-full py-2 px-4 bg-blue-500 hover:bg-green-600 text-black font-semibold rounded-lg transition duration-200"
                    :disabled="loading"
                >
                    {{ loading ? 'Registrando...' : 'Registrarte' }}
                </button>

                <div class="text-center">
                    <router-link to="/login" class="text-blue-500 hover:underline">
                        ¿Ya tienes una cuenta?
                    </router-link>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const loading = ref(false)
const errors = ref({})
const showPassword = ref(false)

const togglePasswordVisibility = () => {
    showPassword.value = !showPassword.value
}

const form = ref({
    firstName: '',
    lastName: '',
    email: '',
    password: '',
    day: 1,
    month: 1,
    year: 2000,
    gender: ''
})

const months = [
    'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
]

const years = computed(() => {
    const currentYear = new Date().getFullYear()
    return Array.from({ length: 100 }, (_, i) => currentYear - i)
})

const handleRegister = async () => {
    const birthDate = `${form.value.year}-${String(form.value.month).padStart(2, '0')}-${String(form.value.day).padStart(2, '0')}`;
    loading.value = true;
    errors.value = {};

    try {
        const response = await fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                firstName: form.value.firstName,
                lastName: form.value.lastName,
                email: form.value.email,
                password: form.value.password,
                birth_date: birthDate,
                gender: form.value.gender,
            })
        });

        const data = await response.json();

        if (!response.ok) {
            if (data.errors) {
                errors.value = data.errors;
            } else {
                errors.value.general = data.message || 'Error al registrar el usuario.';
            }
            throw new Error(data.message);
        }

        localStorage.setItem('token', data.token);
        router.push('/login');
    } catch (error) {
        console.error('Registration error:', error);
    } finally {
        loading.value = false;
    }
}
</script>

<style scoped>
.custom-radio:checked {
    appearance: none;
    background-color: white; /* Change the dot color */
    border: 2px solid black; /* Change the border color */
    border-radius: 50%;
    width: 1rem;
    height: 1rem;
    display: inline-block;
    position: relative;
}
.custom-radio:checked::before {
    content: '';
    display: block;
    width: 0.5rem;
    height: 0.5rem;
    background-color: black;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
