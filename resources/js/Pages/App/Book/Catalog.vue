<template>
  <Head title="List Book" />
  <AuthLayout title="Katalog">
    <div class="md:flex top-0 bg-gray-100 py-5">
		<div class="md:flex-1 my-3 md:my-0">
			<select 
				class="select rounded-full select-primary w-full md:w-56 max-w-xs" 
				@change="selectCategory"
				v-model.number="categoryId"
			>
				<option selected="selected"></option> 
				<option value="1">Buku Islam </option>
				<option value="2">Buku Rohani Kristen </option>
				<option value="3">Buku Anak </option>
				<option value="4">Buku Sekolah </option>
				<option value="5">Bahasa & Kamus </option>
				<option value="6">Biografi & Memoar </option>
				<option value="7">Bisnis & Keuangan </option>
				<option value="8">Hobi & Keterampilan </option>
				<option value="9">Hukum </option>
				<option value="10">Kedokteran & Kesehatan </option>
				<option value="11">Komputer & Internet </option>
				<option value="12">Novel & Sastra </option>
				<option value="13">Pertanian & Lingkungan Hidup </option>
				<option value="14">Pendidikan & Keguruan </option>
				<option value="15">Psikologi & Pengembangan Diri </option>
				<option value="16">Referensi & Ensiklopedi </option>
				<option value="17">Sejarah, Budaya & Filsafat </option>
				<option value="18">Sosial & Politik </option>
				<option value="19">Teknik & Ilmu Pengetahuan </option>
				<option value="20">Buku Umum</option>
				<option value="21">Buku Obral</option>
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
			categoryId: ''
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
        },
		selectCategory() {
			this.$inertia.get(route('book.catalog'), {categoryId: this.categoryId}, {
                preserveState: true,
            });
		}
    },
};
</script>
