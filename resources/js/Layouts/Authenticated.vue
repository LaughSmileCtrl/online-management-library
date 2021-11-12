<template>
    <Drawer></Drawer>
    <div class="relative md:ml-64">
        <Navbar :title="place"></Navbar>
        <div class="relative bg-gray-100 md:pt-24 pb-20 pt-12 min-h-screen">
            <div class="px-4 md:px-10 mx-auto w-full">
                <slot />
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
import Drawer from "@/Components/Drawer.vue";
import Navbar from "@/Components/Navbar.vue";
import Footer from "@/Components/Footer.vue";

export default {
  components: {
    Drawer,
    Navbar,
    Footer,
  },
  data() {
    return {
      place: this.title,
    }
  }, 
  props: {
    title: String,
  }
};
</script>
