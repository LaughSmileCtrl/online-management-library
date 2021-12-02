<template>
  <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
      <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
        <div class="flex flex-wrap items-center">
          <div class="relative w-full max-w-full flex-grow flex-1">
            <h6 class="uppercase mb-1 text-xs font-semibold">
              Overview
            </h6>
            <h2 class="text-xl font-semibold">
              Registrasi member perbulan
            </h2>
          </div>
        </div>
      </div>
      <div class="p-4 flex-auto">
        <!-- Chart -->
        <div class="relative" style="height:350px">
          <canvas id="line-chart"></canvas>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Chart from "chart.js/auto";

export default {
  props: ['lineProperties'],
  mounted: function() {
    this.$nextTick(function() {
      var config = {
        type: "line",
        data: {
          labels: this.lineProperties.lables,
          datasets: [
            {
              label: new Date().getFullYear(),
              borderColor: "#4c51bf",
              data: this.lineProperties.data,
            },
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          plugins: {
            legend: {
              position: 'bottom'
            }
          }
        }
      };
      var ctx = document.getElementById("line-chart").getContext("2d");
      ctx.canvas.parentNode.style.height = '500px';
      ctx.canvas.parentNode.style.weight = '500px';
      window.myLine = new Chart(ctx, config);
    });
  }
};
</script>
