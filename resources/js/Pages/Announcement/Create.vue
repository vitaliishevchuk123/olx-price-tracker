<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import useAuth from "@/Сomposables/useAuth";
import useRoutes from "@/Сomposables/useRoutes";
import {onMounted, ref} from "vue";

const {isAuthenticated, login, getBearerToken} = useAuth();
const {redirectTo, route} = useRoutes();

const form = ref({
    url: '',
    errors: {
        url: '',
    }
});

onMounted(() => {
    if (!isAuthenticated()) {
        redirectTo('login')
    }
});

function clearErrors()
{
    form.value.errors.url = '';
}

const submit = () => {
    clearErrors();
    axios.post('/api/announcements', form.value, {
            headers: {
                'Content-Type': 'multipart/form-data',
                Authorization: `Bearer ${getBearerToken()}`,
            },
        }
    )
        .then(res => {
            redirectTo('home')
        })
        .catch(error => {
            if (error.response && error.response.status === 401) {
                redirectTo('login');
            }
            if (error.response && error.response.data.errors) {
                form.value.errors.url = error.response.data.message;
            }
            console.log(error)
        })
};
</script>

<template>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form @submit.prevent="submit">
                <div class="mb-6">
                    <label for="title"
                           class="block mb-2 text-sm font-medium text-gray-900">
                        Url
                    </label>
                    <input type="text"
                           v-model="form.url"
                           name="title"
                           id="title"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                           placeholder="Type the announcement url here..."
                           required="">
                    <div v-if="form.errors.url" class="text-red-500 text-sm mt-1">
                        {{ form.errors.url }}
                    </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Create
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>
