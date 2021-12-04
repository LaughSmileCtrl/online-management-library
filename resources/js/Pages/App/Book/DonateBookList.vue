<template>
    <Head title="Daftar Donasi Buku" />
    <AuthLayout title="Daftar Donasi Buku">
        <div class="grid grid-cols-2 justify-items-stretch  bg-gray-100 py-5 mb-4">
            <div class="justify-self-start my-3 md:my-0">
                <Link :href="route('book.create')" class="btn btn-primary" v-if="route().current('book.index')">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Buku
                </Link>
            </div>
            <div class="justify-self-end form-control w-full md:w-56 max-w-xs  my-3 md:my-0">
                <div class="relative">
                    <input
                    type="text"
                    placeholder="Search (isbn, author, title)"
                    class="w-full input input-primary rounded-full "
                    v-model="searchQuery"
                    @keyup="search"
                    />
                </div>
            </div>
        </div>
        <div id="book-table" class="my-5">
            <DonateBookTable :books="books.data" />
            <Pagination :links="books.links" />
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import DonateBookTable from "@/Components/Tables/DonateBookTable.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
    props: ["books"],
    data() {
        return {
            searchQuery: '',
        };
    },
    components: {
        AuthLayout,
        Link,
        Head,
        DonateBookTable,
        Pagination,
    },
    computed : {
        prefix() {
            return (route().current('book.*')) 
                ? 'book'
                : 'donate-book';
        }
    },
    methods: {
        search() {
            this.$inertia.get(route(this.prefix+'.index'), {search: this.searchQuery}, {
                preserveState: true,
            });
        }
    },
};
</script>
