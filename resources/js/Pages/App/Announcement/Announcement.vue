<template>
    <Head title="Pengumuman" />
    <AuthLayout title="Pengumuman">
        <div id="book-table">
            <div class="py-5">
                <Link :href="route('announcement.create')" class="btn btn-primary my-5">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Pengumuman
                </Link>
            </div>
            <div class="container flex flex-wrap gap-2 m-5">
                <AnnouncementCard 
                    v-for="(announcement, index) of announcements"
                    :key="index" 
                    :announcement="announcement"
                />
            </div>
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import AnnouncementCard from "@/Components/AnnouncementCard.vue";
import AnnouncementEntry from "@/Components/Forms/AnnouncementEntry.vue";

export default {
    data() {
        return {
        };
    },
    components: {
        AuthLayout,
        Link,
        Head,
        AnnouncementCard,
        AnnouncementEntry,
    },
    props: ['announcements'],
    methods: {

        
    },
};
</script>
