<template>
  <Head title="Statistik" />
  <AuthLayout title="Statistik">
    <!-- <BarChart /> -->
    <LineChart :lineProperties="lineProperties"/>
    <PieChart :pieProperties="pieProperties"/>
  </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import BarChart from "@/Components/BarChart.vue";
import LineChart from "@/Components/LineChart.vue";
import PieChart from "@/Components/PieChart.vue";

export default {
  props: [
    'lineProperties',
    'pieProperties',
  ],
  components: {
    AuthLayout,
    BarChart,
    LineChart,
    PieChart,
  },
};
</script>
