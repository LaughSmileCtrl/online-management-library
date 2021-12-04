<template>
    <Head title="Dashboard" />
    <AuthLayout title="Dashboard">
        <Alert 
            v-for="(announcement, index) of announcements" 
            :key="index" 
            :announcement="announcement"
        />

    <div class="mx-auto flex px-5 py-12 md:flex-row flex-col items-center">
        <div class="lg:flex-grow lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">
                Online Management Library
            </h1>
            <p class="mb-8 leading-relaxed">
                Di dalam aplikasi ini anda dapat melihat daftar buku, meminjam dan mengembalikan buku, serta juga mendonasikan buku.
                Apabila anda telat mengembalikan buku, anda juga dapat melihat denda yang diberikan melalui buku ini.
            </p>
        </div>
    </div>

        <CarouselBook :booksBorrow="booksBorrow"/>
    </AuthLayout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/Authenticated.vue";
import Alert from "@/Components/Announcement.vue";
import CardBook from "@/Components/CardBook.vue";
import CarouselBook from "@/Components/CarouselBook.vue";

export default {
    components: {
        Head,
        AuthLayout,
        Alert,
        CardBook,
        CarouselBook,
    },
	props: ['booksBorrow', 'announcements']
};
</script>