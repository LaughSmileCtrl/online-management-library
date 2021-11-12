<template>
    <Head title="Buku yang dipinjam"></Head>
    <AuthLayout title="List Buku Pinjam">
    <div class="flex flex-wrap justify-center my-9">
        <CardBook type="1" />
        <CardBook type="1" />
        <CardBook type="1" />
        <CardBook type="1" />
        <CardBook type="1" />
        <CardBook type="1" />
    </div>
    </AuthLayout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import AuthLayout from '@/Layouts/Authenticated.vue'
import CardBook from '@/Components/CardBook.vue'

export default {
    components: {
        Head,
        AuthLayout,
        CardBook,
    }
}
</script>
