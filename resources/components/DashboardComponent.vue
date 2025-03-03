<template>
    <div class="min-h-screen bg-gray-500 flex items-center justify-center">
        <div class="bg-gray-100 p-8 rounded-lg shadow-lg text-center">
            <h1 class="text-2xl font-bold mb-4 text-black">¡Bienvenido 🎉</h1>
            <div class="text-center mb-8">
                <img
                    :src="'https://media.istockphoto.com/id/1223088904/es/vector/bandera-cinta-bienvenida-bandera-de-la-vieja-escuela.jpg?s=612x612&w=0&k=20&c=lzeqhAu8AzkGyNQRtSPrClr68fOkQJynivEL8kKxbtw='"
                    alt="Udo logo"
                    class="h-16 mx-auto mb-4 animate-pulse rounded-full"
                />
            </div>

            <p class="text-gray-600 mb-4">Has iniciado sesión correctamente.</p>
            <button
                @click="handleLogout"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200"
            >
                Cerrar Sesión
            </button>
        </div>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router';
import { ref, onMounted } from 'vue';

const router = useRouter();
const user = ref({});

// Obtener datos del usuario desde el token almacenado
onMounted(() => {
    const token = localStorage.getItem('token');
    if (!token) {
        router.push('/login');
        return;
    }

    user.value = { name: 'Usuario' };
});

const handleLogout = () => {
    localStorage.removeItem('token');
    router.push('/login');
};
</script>
