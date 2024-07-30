<script setup>


const props = defineProps({
    item: {
        type: Object,
    },
});

</script>

<template>
    <div
        @click="$emit('changePerPage', props.item.number)"
        class="px-2 cursor-pointer py-1 rounded-md"
        :class="{
            'bg-slate-300': !props.item.active,
            'bg-amber-300': props.item.active,
        }"
    >
        {{ props.item.number }}
    </div>
</template>
