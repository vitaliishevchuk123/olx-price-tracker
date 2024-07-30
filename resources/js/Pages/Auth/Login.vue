<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import useAuth from "@/Сomposables/useAuth";
import useRoutes from "@/Сomposables/useRoutes";
import {ref} from "vue";

const {isAuthenticated, login} = useAuth();
const {redirectTo} = useRoutes();


const loginUser = (token, user) => {
    login(token, user);
    redirectTo('home')
}

const form = ref({
    email: '',
    password: '',
    errors: {
        email: '',
        password: '',
    }
});

const submit = () => {
    axios.post('/api/login', form.value)
        .then(res => {
            form.value.password = '';
            loginUser(res.data.token, res.data.user)
        })
        .catch(error => {
            console.log(error)
        })
};
</script>

<template>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div v-if="isAuthenticated()" class="mb-4 font-medium text-sm text-green-600">
                online
            </div>

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="email" value="Email"/>

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email"/>
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password"/>

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <!--                        <SimpleLink-->
                    <!--                            v-if="canResetPassword"-->
                    <!--                            :href="route('password.request')"-->
                    <!--                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"-->
                    <!--                        >-->
                    <!--                            Forgot your password?-->
                    <!--                        </SimpleLink>-->

                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>
