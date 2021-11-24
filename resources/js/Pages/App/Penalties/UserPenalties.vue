<template>
  <Head title="Daftar Denda" />
  <AuthLayout title="Daftar Denda">
    <div
      class="
        2xl:w-1/2
        my-10
        bg-white
        rounded-lg
        justify-center
        items-center
        h-full
        p-5
      "
    >
      <BillPenalties />
    </div>
  </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import BillPenalties from "@/Components/Tables/BillPenalties.vue";

export default {
  components: {
    AuthLayout,
    BillPenalties,
  },
};
</script>
