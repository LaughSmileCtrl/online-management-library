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
              Perbandingan jumlah buku perkategori
            </h2>
          </div>
        </div>
      </div>
      <div class="p-4 flex-auto flex justify-center">
        <!-- Chart -->
        <div class="relative" >
          <canvas id="pie-chart"></canvas>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Chart from "chart.js/auto";

export default {
  props: ['pieProperties'],
  mounted: function() {
    this.$nextTick(function() {
      var config = {
        type: "pie",
        data: {
          labels: this.pieProperties.lables,
          datasets: [
            {
              label: new Date().getFullYear(),
              backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                'rgb(98, 173, 191)',
                'rgb(187, 204, 102)',
              ],
              borderColor: "#4c51bf",
              data: this.pieProperties.data,
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
      var ctx = document.getElementById("pie-chart").getContext("2d");
      ctx.canvas.parentNode.style.height = '500px';
      ctx.canvas.parentNode.style.weight = '500px';
      window.myLine = new Chart(ctx, config);
    });
  }
};
</script>
