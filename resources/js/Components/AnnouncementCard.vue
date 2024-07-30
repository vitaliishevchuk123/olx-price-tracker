<script setup>
import {ref} from "vue";

const {announcement} = defineProps(['announcement']);
const showDropdown =  ref(false);
</script>

<template>
    <article class="flex justify-start gap-4 mb-4 bg-white shadow-lg rounded-lg p-4">
        <div>
            <div class="w-80 h-80 flex items-center justify-center overflow-hidden">
                <img :src="announcement.img ?? '/img/front/announcement.jpeg'"
                     alt="image announcement"
                     class="w-full h-full object-cover">
            </div>
        </div>
        <div class="flex flex-col gap-2 w-full">
            <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">

                {{ announcement.title }}
            </h2>
            <p class="mb-4 text-gray-500">
                <a :href="announcement.url">{{ announcement.url }}</a>

            </p>
            <div class="flex items-center mb-4 ml-auto">
                <div>
                    <div class="text-xl font-bold">Поточна ціна: {{ announcement.prices.slice(-1)[0].format_price }}</div>
                </div>
            </div>
            <div class="max-w-md p-4">
                <div class="relative">
                    <button @click="showDropdown = !showDropdown"
                            class="text-xl font-bold mb-4 w-full text-left flex items-center">
                        Історія змін ціни
                        <svg :class="{'rotate-180': showDropdown, 'rotate-0': !showDropdown}" class="ml-2 w-5 h-5 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div v-if="showDropdown" class="mt-2 w-full rounded-lg p-4">
                        <div v-for="price in [...announcement.prices].reverse()"
                             :key="price.id"
                             class="flex items-center mb-4">
                            <img width="70"
                                 class="main-logo mr-1"
                                 src="/public/img/front/money_Icon.png"
                                 alt="money Icon"
                                 title="money Icon">
                            <div>
                                <div class="text-lg font-semibold">{{ price.format_price }}</div>
                                <div class="text-sm text-gray-500">Змінилося: {{ price.created_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </article>
</template>

<style scoped>
</style>
