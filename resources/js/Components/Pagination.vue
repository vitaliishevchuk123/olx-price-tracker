<script setup>
import {computed} from "vue";

const props = defineProps({
    total: Number,
    currentPerPage: Number,
    currentPage: Number,
})

const totalPages = computed(() => Math.ceil(props.total / props.currentPerPage));

const paginationLinks = computed(() => {
    const current = props.currentPage;
    const last = totalPages.value;

    if (last <= 5) {
        return Array.from({length: last}, (_, i) => i + 1);
    } else if (current <= 3) {
        return [1, 2, 3, 4, '...', last];
    } else if (current >= last - 2) {
        return [1, '...', last - 3, last - 2, last - 1, last];
    } else {
        return [1, '...', current - 1, current, current + 1, '...', last];
    }
});

</script>

<template>
    <div v-if="total > 0" class="grid gap-3">
        <div v-if="totalPages > 1" class="pagination flex justify-center items-center text-base">
            <div v-for="page in paginationLinks"
                 :key="`page-${page}`"
                 @click="$emit('showPage', page)"
            >
                <span class="px-2 cursor-pointer py-1 rounded-md"
                      :class="{
                          'bg-amber-300': page === currentPage,
                      }"
                >
                    {{ page }}
                </span>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
</style>
