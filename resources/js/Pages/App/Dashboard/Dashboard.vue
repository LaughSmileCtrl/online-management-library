<template>
    <Head title="Dashboard" />
    <AuthLayout title="Dashboard">
        <Alert 
            v-for="(announcement, index) of announcements" 
            :key="index" 
            :announcement="announcement"
        />
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