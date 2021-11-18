<template>
  <Head title="Sumbang Buku" />
  <AuthLayout title="Sumbang Buku">
    <BookEntry ref="bookEntry" @uploadedImage="previewFile"/>
  </AuthLayout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/Authenticated.vue";
import BookEntry from "@/Components/Forms/BookEntry.vue";

export default {
  components: {
    AuthLayout,
    Head,
    BookEntry,
  },
  data() {
      return {
          
      }
  },
  methods: {
    previewFile(event) {
        var img= event.target.files[0];
        this.$refs.bookEntry.showImg(img);
    },
  },
};
</script>
