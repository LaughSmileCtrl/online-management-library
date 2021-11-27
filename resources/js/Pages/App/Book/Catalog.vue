<template>
  <Head title="List Book" />
  <AuthLayout title="Katalog">
    <div class="md:flex top-0 bg-gray-100 py-5">
		<div class="md:flex-1 my-3 md:my-0">
			<select class="select rounded-full select-primary w-full md:w-56 max-w-xs">
				<option disabled="disabled" selected="selected">Ketegori</option> 
				<option>telekinesis</option> 
				<option>time travel</option> 
				<option>invisibility</option>
			</select>
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
    <div class="flex flex-wrap justify-center mb-9">
    	<CardBook v-for="(book, index) of books.data" :key="index" type="0" :isAgree="false" :book="book" />
    </div>
    <div class="flex flex-wrap justify-center mb-9">
		<Pagination :links="books.links" />
	</div>
  </AuthLayout>

</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/Authenticated.vue";
import CardBook from "@/Components/CardBook.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
	data() {
		return {
            searchQuery: '',
		}
	},
	props: ['books'],
    components: {
        Head,
        AuthLayout,
        CardBook,
		Pagination,
    },
    methods: {
        search() {
            this.$inertia.get(route('book.catalog'), {search: this.searchQuery}, {
                preserveState: true,
            });
        }
    },
};
</script>
