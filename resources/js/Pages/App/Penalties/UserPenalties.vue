<template>
  <Head title="Daftar Denda" />
  <AuthLayout title="Daftar Denda">
    <div
      class="
        my-10
        bg-white
        rounded-lg
        justify-center
        items-center
        h-full
        p-5
      "
    >
      <BillPenalties :penalties="penalties"/>
    </div>
  </AuthLayout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/Authenticated.vue";
import BillPenalties from "@/Components/Tables/BillPenalties.vue";

export default {
  props:['penalties'],
  components: {
    Head,
    AuthLayout,
    BillPenalties,
  },
};
</script>
