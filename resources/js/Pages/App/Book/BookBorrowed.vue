<template>
    <Head title="Buku yang dipinjam"></Head>
    <AuthLayout title="Daftar Buku Dipinjam">
    <div class="flex flex-wrap justify-center my-9">
        <CardBook v-for="(bookBorrow, index) of booksBorrow.data" 
            :key="index" 
            :book="bookBorrow.book" 
            :dueAt="bookBorrow.due_at"
            isBorrowed="true"
        />
    </div>
    <div class="flex flex-wrap justify-center mb-9">
		<Pagination :links="booksBorrow.links" />
	</div>
    </AuthLayout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import AuthLayout from '@/Layouts/Authenticated.vue'
import CardBook from '@/Components/CardBook.vue'
import Pagination from "@/Components/Pagination.vue";

export default {
    components: {
        Head,
        AuthLayout,
        CardBook,
        Pagination,
    },
	props: ['booksBorrow'],

}
</script>
