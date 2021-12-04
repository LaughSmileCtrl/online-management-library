<template>
<Head title="Register" />
<AuthView>
    <template v-slot:form>
        <h2 class="text-xl my-3 font-bold">
            Laman Registrasi Online Management Library
        </h2>

        <form @submit.prevent="submit">
            <div>
                <BreezeLabel for="name" value="Name" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                <p v-if="form.errors.name" class="text-red-500 text-sm">{{ form.errors.name}}</p>
            </div>

            <div class="mt-4">
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
                <p v-if="form.errors.email" class="text-red-500 text-sm">{{ form.errors.email}}</p>
            </div>

            <div class="mt-4">
                <BreezeLabel for="password" value="Password" />
                <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                <p v-if="form.errors.password" class="text-red-500 text-sm">{{ form.errors.password}}</p>
            </div>

            <div class="mt-4">
                <BreezeLabel for="password_confirmation" value="Confirm Password" />
                <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                <p v-if="form.errors.password_confirmation" class="text-red-500 text-sm">{{ form.errors.password_confirmation}}</p>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Sudah punya akun?
                </Link>

                <button class="btn btn-primary ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Registrasi
                </button>
            </div>
        </form>
    </template>
    <template v-slot:image>
        <img class="w-full" src="/images/auth/register.png" alt="Register Page">
    </template>
</AuthView>
    
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import AuthView from '@/Components/AuthView.vue';

export default {


    components: {
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        Link,
        AuthView,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                terms: false,
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            })
        }
    }
}
</script>
