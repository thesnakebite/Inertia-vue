<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
    import { Head } from '@inertiajs/vue3'
    import PrimaryButton from '@/Components/PrimaryButton.vue'

    defineProps([
        'title', 
        'subtitle'
    ])
</script>

<template>
    <Head title="Chirps">
        <meta name="description" content="Chirps description" />
    </Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ title }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form>
                            <textarea
                                placeholder="What's on your mind?"
                                class="block w-full rounded-md border-gray-700 focus:border-none bg-white dark:bg-gray-800 shadow-sm focus:bg-gray-700 dark:focus:bg-gray-800 active:bg-white dark:active:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-emerald-500 focus:ring-offset-1 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            >
                            </textarea>
                            <PrimaryButton class="mt-2">Chirps</PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>