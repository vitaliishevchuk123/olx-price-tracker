<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";</script>

<template>
    <div class="main-wrapper min-h-screen mx-auto">
        <Header/>
        <!-- Page Content -->
        <main>
            <router-view></router-view>
            <slot/>
        </main>
        <Footer/>
    </div>
</template>

<style scoped lang="scss">
.main-wrapper {
    display: grid;
    grid-template-rows: auto 1fr auto; /* автоматична висота хедера та футера, решта простір на контент */
    min-height: 100vh; /* забезпечення повноекранного розміщення */
}
</style>
