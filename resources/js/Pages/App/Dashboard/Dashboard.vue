<template>
  <Head title="Dashboard" />
  <AuthLayout title="Dashboard">
    <Alert />
    <CarouselBook /> 

    <div class="flex flex-wrap justify-center my-9">
      <CardBook type="1"/>
      <CardBook type="0"/>
    </div>
  </AuthLayout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/Authenticated.vue";
import Alert from "@/Components/Announcement.vue";
import CardBook from "@/Components/CardBook.vue";
import CarouselBook from "@/Components/CarouselBook.vue"


export default {
  components: {
    Head,
    AuthLayout,
    Alert,
    CardBook,
    CarouselBook,

  },
};
</script>