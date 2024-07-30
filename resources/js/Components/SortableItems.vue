<script setup>
import SortableItem from "./SortableItem.vue";
import {ref} from "vue";

const emit = defineEmits(['sortChanged']);

const sortableLabels = ref([
    {
        name: 'Дата',
        direction: 'desc',
        active: true,
        slug: 'created_at'
    }
]);

function changeActiveLabel(labelSlug) {
    sortableLabels.value.forEach(label => {
        if (label.slug == labelSlug) {
            label.active = true
            if (label.direction == 'asc') {
                label.direction = 'desc'
            } else {
                label.direction = 'asc'
            }

            pushActiveLabel(label);
        } else {
            label.active = false
        }
    })
}

function pushActiveLabel(activeLabelSlug) {
    emit('sortChanged', activeLabelSlug);
}

</script>
<template>
    <div class="flex mb-6 gap-3 items-center justify-start p-2 first:pl-0">
        <SortableItem
            v-for="label in sortableLabels"
            :name="label.name"
            :direction="label.direction"
            :active="label.active"
            :slug="label.slug"
            @click-sort-label="changeActiveLabel"
        />
    </div>
</template>
