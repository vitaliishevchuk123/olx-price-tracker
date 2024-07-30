<script setup>
import SocialIcon from "@/Components/SocialIcon.vue";
import SocialIcons from "@/Components/SocialIcons.vue";
import MainApplicationLogo from "@/Components/MainApplicationLogo.vue";</script>

<template>
    <footer class="footer w-full bottom-0 pb-4 pt-4 bg-slate-900 text-white">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="footer-bottom-wrapper grid grid-cols-2 md:flex md:items-center md:justify-around">
                <div class="footer-policy flex-col items-center space-y-2 row-span-2 flex items-center justify-center">
                    <router-link to="/">
                        <MainApplicationLogo class="block h-9 w-auto fill-current"/>
                    </router-link>
                    <div>
                        ©2024 All rights reserved
                    </div>
                </div>
                <SocialIcons>
                    <SocialIcon>
                        <i class="fa-brands fa-facebook"></i>
                    </SocialIcon>
                    <SocialIcon>
                        <i class="fa-brands fa-instagram"></i>
                    </SocialIcon>
                    <SocialIcon>
                        <i class="fa-brands fa-telegram"></i>
                    </SocialIcon>
                    <SocialIcon>
                        <i class="fa-brands fa-viber"></i>
                    </SocialIcon>
                </SocialIcons>
            </div>
        </div>
    </footer>
</template>

<style scoped lang="scss">

</style>
