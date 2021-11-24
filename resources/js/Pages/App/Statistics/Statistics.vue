<template>
  <Head title="Statistik" />
  <AuthLayout title="Statistik">
    <BarChart />
    <LineChart />
  </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import BarChart from "@/Components/BarChart.vue";
import LineChart from "@/Components/LineChart.vue";

export default {
  components: {
    AuthLayout,
    BarChart,
    LineChart,
  },
};
</script>
