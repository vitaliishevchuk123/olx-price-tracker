<script setup>

defineProps({
    name: String,
    direction: String,
    active: {
        type: Boolean,
        default: false,
    },
    slug: String,
});

</script>
<template>
    <div @click="$emit('clickSortLabel', slug)" class="cursor-pointer rounded-lg bg-slate-300 px-2">
        {{ name }}
        <i v-if="!active" class="fa-solid fa-sort"></i>
        <i v-if="active && direction == 'asc'" class="fa-solid fa-sort-up"></i>
        <i v-if="active && direction == 'desc'" class="fa-solid fa-sort-down"></i>
    </div>

</template>
<style scoped lang="scss">

</style>
