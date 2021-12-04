<template>
    <Head title="Daftar Buku"/>
    <AuthLayout title="Daftar Buku">
        <div class="grid grid-cols-2 justify-items-stretch  bg-gray-100 py-5 mb-4">
            <div class="justify-self-start my-3 md:my-0">
                <Link :href="route('book.create')" class="btn btn-primary" v-if="route().current('book.index')">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Buku
                </Link>
                <button @click="exportPdf" class="btn ml-3" v-if="route().current('book.index')">
                    Export ke PDF
                </button>
                <button @click="exportExcel" class="btn ml-3" v-if="route().current('book.index')">
                    Export ke Excel
                </button>
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
            <BookTable :books="books.data" />
            <Pagination :links="books.links" />
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import BookTable from "@/Components/Tables/BookTable.vue";
import Pagination from "@/Components/Pagination.vue";
import axios from 'axios';

export default {
    props: ["books"],
    data() {
        return {
            searchQuery: '',
        };
    },
    components: {
        AuthLayout,
        Head,
        Link,
        BookTable,
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
        },
        exportPdf() {
            axios.get(route('print-book-pdf'), {
                responseType: 'blob'
            })
            .then(function(response) {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'daftar-buku.pdf'); //or any other extension
                document.body.appendChild(link);
                link.click();
            });
        },
        exportExcel() {
            axios.get(route('print-book-excel'), {
                responseType: 'blob'
            })
            .then(function(response) {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'daftar-buku.xlsx'); //or any other extension
                document.body.appendChild(link);
                link.click();
            });
        },
    },
};
</script>
