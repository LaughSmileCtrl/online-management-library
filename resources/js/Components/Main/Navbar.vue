<template>
  <!-- Navbar -->
  <nav
    class="
      absolute
      top-0
      left-0
      w-full
      z-10
      bg-transparent
      md:flex-row md:flex-nowrap md:justify-start
      flex
      items-center
      p-4
      hidden
      md:flex
      bg-primary
    "
  >
    <div
      class="
        w-full
        mx-autp
        items-center
        flex
        justify-between
        md:flex-nowrap
        flex-wrap
        md:px-10
        px-4
      "
    >
      <!-- Brand -->
      <h2
        class="
          text-white text-sm
          uppercase
          hidden
          lg:inline-block
          font-semibold
        "
      >
        {{ place }}
      </h2>
      <!-- User -->
      <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
        <UserDropdownComponent></UserDropdownComponent>
      </ul>
    </div>
  </nav>

  <!-- End Navbar -->
</template>
<script>
import UserDropdownComponent from "@/Components/Main/UserDropdown.vue";
export default {
  components: {
    UserDropdownComponent,
  },
  data() {
    return {
      place: this.title,
    };
  },
  props: {
    title: String,
  },
};
</script>
