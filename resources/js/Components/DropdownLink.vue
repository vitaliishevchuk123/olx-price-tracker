<script setup>
defineProps({
    href: {
        type: String,
        required: true,
    },
    inertia: {
        type: Boolean,
        default: true,
    }
});
</script>

<template>
    <router-link v-if="inertia"
                 :to="href"
                 class="block w-full px-4 py-2 text-left text-sm leading-5 text-white hover:bg-yellow-dark focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
    >
        <slot/>
    </router-link>
    <a
        v-else
        :href="href"
        class="block w-full px-4 py-2 text-left text-sm leading-5 text-white hover:bg-yellow-dark focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
    >
        <slot/>
    </a>
</template>
