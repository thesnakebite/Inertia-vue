<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
    import { Head, useForm } from '@inertiajs/vue3'
    import InputError from '@/Components/InputError.vue'
    import PrimaryButton from '@/Components/PrimaryButton.vue'
    import ChirpItem from '@/Components/ChirpItem.vue'

    defineProps([
        'chirps',
    ])

    const form = useForm({
        message: '',
    })

    function submit() {
        form.post(route('chirps.store'), {
            onSuccess: () => form.reset(),
            preserveState: false,
        })
    }
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
                        <form @submit.prevent="submit">
                            <textarea
                                v-model="form.message"
                                placeholder="What's on your mind?"
                                class="block w-full rounded-md border-gray-700 focus:border-none bg-white dark:bg-gray-800 shadow-sm focus:bg-gray-700 dark:focus:bg-gray-800 active:bg-white dark:active:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-emerald-500 focus:ring-offset-1 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            >
                            </textarea>
                            <InputError :message="form.errors.message" class="mt-2" />

                            <PrimaryButton :disabled="form.processing" 
                                            class="mt-2"
                            >
                                {{ form.processing ? 'Enviando...' : 'Chirps' }}
                            </PrimaryButton>
                        </form>
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