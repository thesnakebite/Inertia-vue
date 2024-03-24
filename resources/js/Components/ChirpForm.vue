<script setup>
    import { useForm } from '@inertiajs/vue3'
    import InputError from '@/Components/InputError.vue'
    import PrimaryButton from '@/Components/PrimaryButton.vue'
    import SecondaryButton from '@/Components/SecondaryButton.vue'
    import __ from "@/Hooks/useTranslation.js";

    const { chirp } = defineProps({
        chirp: {
            type: Object,
            required: false,
        }
    })

    const form = useForm({
        message: chirp?.message,
    })

    function update(chirp) {
        form.patch(route('chirps.update', chirp), {
            onSuccess: () => form.reset(),
            preserveState: false,
        })
    }

    function submit() {
        if (chirp?.id) {
            update(chirp.id)
            
            return
        }
        form.post(route('chirps.store'), {
            onSuccess: () => form.reset(),
            preserveState: false,
        })
    }
</script>

<style scoped>

</style>

<template>
    <form @submit.prevent="submit">
        <textarea
            v-model="form.message"
            :placeholder="__('What\'s on your mind?')"
            class="block w-full rounded-md border-gray-700 focus:border-none bg-white dark:bg-gray-800 text-black dark:text-gray-200 shadow-sm focus:bg-white dark:focus:bg-gray-800 active:bg-white dark:active:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-emerald-500 focus:ring-offset-1 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
            
        >
        </textarea>
        <InputError :message="form.errors.message" class="mt-2" />

        <PrimaryButton 
            :disabled="form.processing" 
            class="mt-2 bg-rose-500 dark:bg-emerald-600 dark:text-black"
        >
            {{ form.processing ? 'Enviando...' : 'Chirps' }}
        </PrimaryButton>
        <SecondaryButton 
            v-if="chirp?.id" 
            @click="$emit('cancel')" 
            class="ml-2"
        >
            Cancel
        </SecondaryButton>
    </form>
</template>