<script setup>
const props = defineProps({
    href: {
        type: String,
        default: 'javascript:void(0);',
    },
})

</script>

<template>
    <button v-if="href == 'javascript:void(0);'">
        <slot/>
    </button>
    <router-link v-else
                 :to="href">
        <slot/>
    </router-link>
</template>

<style scoped lang="scss">
</style>
