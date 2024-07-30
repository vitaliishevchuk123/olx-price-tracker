<script setup>
import MainApplicationLogo from '@/Components/MainApplicationLogo.vue';
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import IconCounter from "@/Components/IconCounter.vue";
import {ref} from "vue";
import useRoutes from "@/Сomposables/useRoutes";
import useAuth from "@/Сomposables/useAuth";

const {isRoute, route, redirectTo, currentRouteName} = useRoutes();
const {isAuthenticated, authUser, logout} = useAuth();
const showingNavigationDropdown = ref(isAuthenticated());

const logoutUser = () => {
    logout();
    redirectTo(currentRouteName())
}

</script>

<template>
    <header>
        <nav class="nav bg-dark-site border-b border-header">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex items-center mr-6">
                            <router-link to="/">
                                <MainApplicationLogo
                                    class="block h-9 w-auto fill-current text-white"
                                />
                            </router-link>
                        </div>
                    </div>

                    <div class="hidden md:flex md:items-center md:ml-6 md:gap-6">
                        <!-- Settings Dropdown -->
                        <div v-if="isAuthenticated()" class="ml-3 relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-gray focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ authUser()?.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                </template>

                                <template #content>
                                    <!--                                    <DropdownLink :href="route('home')">Personal cabinet</DropdownLink>-->
                                    <DropdownLink href="#" method="post" as="button" @click="logoutUser()">
                                        Go out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                        <template v-else>
                            <NavLink v-if="!isAuthenticated()"
                                     href="/register"
                                     :active="isRoute('register')"
                                     class="nav-link nav-link--white">
                                Sign up
                            </NavLink>
                            <NavLink v-if="!isAuthenticated()"
                                     :active="isRoute('login')"
                                     :href="route('login')"
                                     class="nav-link nav-link--white">
                                <span
                                    class="mr-1"
                                >Sign in
                                    </span>
                                <i class="fa-solid fa-user pt-[0.15em]"></i>
                            </NavLink>
                        </template>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center md:hidden">
                        <button
                            @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="inline-flex items-center justify-center p-2 rounded-md text-white focus:outline-none transition duration-150 ease-in-out"
                        >
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path
                                    :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div
                :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                class="md:hidden"
            >
                <div class="pt-2 pb-3 space-y-1">
                    <ResponsiveNavLink href="/" :active="isRoute('/')">
                        Home
                    </ResponsiveNavLink>
                    <ResponsiveNavLink v-if="true"
                                       :active="isRoute('register')"
                                       href="register">
                        Register
                    </ResponsiveNavLink>
                    <ResponsiveNavLink v-if="true"
                                       :active="isRoute('login')"
                                       href="login">
                                <span
                                    class="mr-1"
                                >Sign in</span>
                        <i class="fa-solid fa-user pt-[0.15em]"></i>
                    </ResponsiveNavLink>
                </div>

                <!-- Responsive Settings Options -->
                <div v-if="false" class="pt-4 pb-1 border-t border-gray-800">
                    <div class="px-4">
                        <div class="font-medium text-white">
                            {{ authUser()?.name }}
                        </div>
                        <div class="font-medium text-sm text-gray-400"> {{ authUser()?.email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink href="profile/edit">Personal cabinet</ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                            Go out
                        </ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<style scoped lang="scss">

.bg-dark-site {
    background: #134e4a;
}

.border-header {
    border-bottom-color: rgba(133, 143, 164, 0.15);
}

.c-text-gray {
    color: yellow;
}

.nav-link {
    color: gray;
    text-align: right;
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: 140%;

    &:hover {
        color: #FFF;
    }

    &--white {
        color: #FFF;
    }
}
</style>
