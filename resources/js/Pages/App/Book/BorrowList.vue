<template>
    <Head title="Daftar Buku Dipinjam" />
    <AuthLayout title="Daftar Buku Dipinjam">
        <div class="grid grid-cols-2 justify-items-stretch  bg-gray-100 py-5 mb-4">
            <div class="justify-self-start my-3 md:my-0">
            </div>
            <div class="justify-self-end form-control w-full md:w-56 max-w-xs  my-3 md:my-0">
            </div>
        </div>
        <div id="book-table" class="my-5">
            <BorrowBookTable :userBooks="userBooks.data" />
            <Pagination :links="userBooks.links" />
        </div>
    </AuthLayout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/Authenticated.vue";
import BorrowBookTable from "@/Components/Tables/BorrowBookTable.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
    props: ['userBooks'],
    components: {
        Head,
        AuthLayout,
        BorrowBookTable,
        Pagination,
    },

    methods: {
    },
};
</script>
