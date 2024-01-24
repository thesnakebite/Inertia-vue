<script setup>

    defineProps([
        'title', 
        'subtitle'
    ])
</script>

<template>
    <div class="min-h-screen flex justify-center items-center bg-slate-400">
            <span class="bg-black text-white p-6 px-12 rounded-full text-3xl">{{ title }} <br/>
                <small class="text-gray-400 text-sm justify-center items-center flex">{{ subtitle }}</small>
            </span>
    </div>
</template>