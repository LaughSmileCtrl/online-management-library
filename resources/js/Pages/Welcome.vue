<template>
    <Head title="Welcome" />

    <header class="text-blue-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-blue-900 mb-4 md:mb-0">
                
                <span class="ml-3 text-xl">Onary</span>
            </a>
            <nav v-if="canLogin" class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-blue-700">
                    Dashboard
                </Link>

                <template v-else>
                    <Link :href="route('login')" class="text-sm text-blue-700">
                        Log in
                    </Link>

                    <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-blue-700">
                        Register
                    </Link>
                </template>
            </nav>
        </div>
    </header>
    <section class="text-blue-900 body-font min-h-screen">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font font-black md:text-5xl sm:text-4xl text-3xl mb-4 font-medium text-blue-900">
                    Online Management Library
                </h1>
                <p class="mb-8 leading-relaxed">
                    Ini adalah sistem informasi perpustakaan Politeknik Elektronika Negeri Surabaya kampus Sumenep.
                    Silahkan registrasi untuk menggunakan aplikasi ini
                </p>
                <div class="flex justify-center">
                    <Link :href="route('register')" class="btn btn-primary">Registrasi</Link>
                </div>
            </div>
            <div class="lg:w-1/2 md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero" src="/images/homepage.png">
            </div>
        </div>
    </section>

        
</template>

<style scoped>
</style>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
      Head,
      Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
}
</script>
