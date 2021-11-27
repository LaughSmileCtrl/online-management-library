<template>
    <Head title="Denda" />
    <AuthLayout title="Denda">
        <div
            class="grid grid-cols-2 justify-items-stretch bg-gray-100 py-5 mb-4"
        >
            <div class="justify-self-start my-3 md:my-0">
            </div>
            <div
                class="
                    justify-self-end
                    form-control
                    w-full
                    md:w-56
                    max-w-xs
                    my-3
                    md:my-0
                "
            >
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Search (user_id"
                        class="w-full input input-primary rounded-full"
                        v-model="searchQuery"
                        @keyup="search"
                    />
                </div>
            </div>
        </div>
        <div id="book-table" class="my-5">
            <PenaltiesTable :penalties="penalties.data" />
            <Pagination :links="penalties.links" />
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import PenaltiesTable from "@/Components/Tables/PenaltiesTable.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
    components: {
        AuthLayout,
        PenaltiesTable,
		Pagination,
    },
    props: ["penalties"],
    data() {
        return {
            searchQuery: '',
        }
    },
    methods: {
        search() {
            this.$inertia.get(route('penalties.index'), {search: this.searchQuery}, {
                preserveState: true,
            });
        }
    }
};
</script>
