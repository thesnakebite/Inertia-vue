<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
    import { Head } from '@inertiajs/vue3'
    import ChirpItem from '@/Components/ChirpItem.vue'
    import ChirpForm from '@/Components/ChirpForm.vue'

    defineProps([
        'chirps',
    ])
</script>

<template>
    <Head title="Chirps">
        <meta name="description" content="Chirps description" />
    </Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Chirps Index</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Formulario -->
                        <ChirpForm />
                    </div>
                </div>
                <!-- Listar registros -->
                <div class="mt-6 bg-white dark:bg-gray-800 shadow-md rounded-lg divide-y divide-black dark:divide-slate-700">

                    <ChirpItem 
                        v-for="chirp in chirps" 
                        :key="`chirps-${chirp.id}`" 
                        :chirp="chirp"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>