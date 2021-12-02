<template>
    <Head title="Anggota" />
    <AuthLayout title="Anggota">
        <div class="grid grid-cols-2 justify-items-stretch  bg-gray-100 py-5 mb-4">
            <div class="justify-self-start my-3 md:my-0">
                <Link :href="route('user.create')" class="btn btn-primary">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Member
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
            <UserTable :users="users.data" />
            <Pagination :links="users.links" />
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import { Link } from "@inertiajs/inertia-vue3";
import UserTable from "@/Components/Tables/UserTable.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
	props: ['users'],
    data() {
        return {
            searchQuery: '',
        };
    },
    components: {
        AuthLayout,
        Link,
        UserTable,
		Pagination
    },
    methods: {
        search() {
            this.$inertia.get(route('user.index'), {search: this.searchQuery}, {
                preserveState: true,
            });
        }
    }
};
</script>
