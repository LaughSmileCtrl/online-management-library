<template>
  <Head title="List Book" />
  <AuthLayout title="Katalog">
    <div class="sticky md:flex top-0 bg-gray-100 z-10 py-5">
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
				placeholder="Search"
				class="w-full pr-16 input input-primary rounded-full "
				/>
				<button class="absolute top-0 right-0 rounded-r-full btn btn-primary">
				<div class="fa fa-search"></div>
				</button>
			</div>
		</div>
    </div>
    <div class="flex flex-wrap justify-center mb-9">
      <CardBook type="0" :isAgree="false" />
      <CardBook type="1"/>
      <CardBook type="0"/>
    </div>
  </AuthLayout>
  <Agreement v-show="false" ref="modal" />
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/Authenticated.vue";
import CardBook from "@/Components/CardBook.vue";

export default {
    components: {
        Head,
        AuthLayout,
        CardBook,
    },
    methods: {
        
    },
};
</script>
