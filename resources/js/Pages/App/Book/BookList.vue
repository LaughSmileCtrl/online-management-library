<template>
    <AuthLayout>
        <div class="md:flex top-0 bg-gray-100 py-5 mb-4">
            <div class="md:flex-1 my-3 md:my-0" v-if="route().current('book.index')">
                <Link :href="route('book.create')" class="btn btn-primary">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Buku
                </Link>
            </div>
            <div class="md:flex-none form-control w-full md:w-56 max-w-xs  my-3 md:my-0">
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
            <div class="alert alert-info mb-5" v-if="$page.props.flash.message">
                <div class="flex-1">
                    <label>{{ $page.props.flash.message }}</label>
                </div>
            </div>
            <BookTable :books="books" />
            <Pagination :links="books.links" />
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import { Link } from "@inertiajs/inertia-vue3";
import BookTable from "@/Components/Tables/BookTable.vue";
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
        }
    },
};
</script>
