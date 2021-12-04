<template>
  <Head title="Statistik" />
  <AuthLayout title="Statistik">
    <div class="grid grid-cols-2 justify-items-stretch  bg-gray-100 py-5 mb-4">
        <div class="justify-self-start my-3 md:my-0">
        </div>
        <div class="justify-self-end form-control w-full md:w-56 max-w-xs  my-3 md:my-0">
        </div>
    </div>
    <div class="" ref="statistic">
      <LineChart :lineProperties="lineProperties"/>
      <PieChart :pieProperties="pieProperties"/>
    </div>
  </AuthLayout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/Authenticated.vue";
import LineChart from "@/Components/LineChart.vue";
import PieChart from "@/Components/PieChart.vue";

export default {
  props: [
    'lineProperties',
    'pieProperties',
  ],
  components: {
    AuthLayout,
    Head,
    LineChart,
    PieChart,
  },
  methods: {
  }
};
</script>
