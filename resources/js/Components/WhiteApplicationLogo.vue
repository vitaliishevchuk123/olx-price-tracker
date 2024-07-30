<template>
    <div class="flex flex-row items-center">
        <img class="main-logo mr-1" src="/public/img/front/white-logo.png" alt="" title="main logo">
        <span class=""><span class="text-red-500">La</span>Vue forum</span>
    </div>
</template>
<style scoped>
.main-logo {
    height: 36px;
}

@media (max-width: 960px) {
    .main-logo {
        height: 19px;
    }
}

@media (max-width: 320px) {
    .main-logo {
        height: 16px;
    }
}
</style>
