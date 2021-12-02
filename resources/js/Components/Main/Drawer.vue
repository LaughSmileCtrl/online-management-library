<template>
  <nav
    class="
      md:left-0
      md:block
      md:fixed
      md:top-0
      md:bottom-0
      md:overflow-y-auto
      md:flex-row
      md:flex-nowrap
      md:overflow-hidden
      shadow-xl
      bg-blue-400
      md:bg-white
	  flex flex-wrap
      items-center
      justify-between
      relative
      md:w-64
      z-10
      py-4
      px-3
    "
  >
    <div
      class="
        md:flex-col md:items-stretch md:min-h-full md:flex-nowrap
        px-0
        flex flex-wrap
        items-center
        justify-between
        w-full
        mx-auto
      "
    >
      <!-- Toggler -->
      <button
        class="
          cursor-pointer
          text-black
          opacity-50
          md:hidden
          px-3
          py-1
          text-xl
          leading-none
          bg-transparent
          rounded
          border border-solid border-transparent
        "
        type="button"
        v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Brand -->
      <Link
        href="/"
        class="
          md:block
          text-left
          md:pb-2
          text-gray-600
          mr-0
          inline-block
          whitespace-nowrap
          text-sm
          uppercase
          font-bold
          p-4
          px
        "
      >
        <ApplicationLogo
          class="w-10 h-10 mr-2 fill-current text-gray-500 inline-block"
        />
        Onary
      </Link>
      <!-- User -->
      <ul class="md:hidden items-center flex flex-wrap list-none">
        <li class="inline-block relative">
          <UserDropdownComponent></UserDropdownComponent>
        </li>
      </ul>
      <!-- Collapse -->
      <div
        class="
          md:flex
          md:flex-col
          md:items-stretch
          md:opacity-100
          md:relative
          md:mt-4
          md:shadow-none
          shadow
          absolute
          top-0
          left-0
          right-0
          z-100
          overflow-y-auto overflow-x-hidden
          h-auto
          items-center
          flex-1
          rounded
        "
        v-bind:class="collapseShow"
      >
        <!-- Collapse header -->
        <div
          class="
            md:min-w-full md:hidden
            block
            pb-4
            mb-4
            border-b border-solid border-gray-200
          "
        >
          <div class="flex flex-wrap">
            <div class="w-6/12">
              <a
                class="
                  md:block
                  text-left
                  md:pb-2
                  text-gray-600
                  mr-0
                  inline-block
                  whitespace-nowrap
                  text-sm
                  uppercase
                  font-bold
                  p-4
                  px-0
                "
                href="javascript:void(0)"
              >
                Tailwind Starter Kit
              </a>
            </div>
            <div class="w-6/12 flex justify-end">
              <button
                type="button"
                class="
                  cursor-pointer
                  text-black
                  opacity-50
                  md:hidden
                  px-3
                  py-1
                  text-xl
                  leading-none
                  bg-transparent
                  rounded
                  border border-solid border-transparent
                "
                v-on:click="toggleCollapseShow('hidden')"
              >
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="md:flex-col md:min-w-full flex flex-col list-none">
          <li class="items-center">
				    <NavLink :href="route('dashboard')" :active="route().current('dashboard')" icon="fas fa-tv">Dashboard</NavLink>
          </li>
          <li class="items-center">
            <NavLink :href="route('book.catalog')" :active="route().current('book.catalog')" icon="fa fa-book">Katalog</NavLink>
          </li>
          <li class="items-center">
            <NavLink :href="route('book-borrow.index')" :active="route().current('book-borrow.index')" icon="fa fa-undo">Pengembalian</NavLink>
          </li>
          <li class="items-center">
            <NavLink :href="route('donate-book.create')" :active="route().current('donate-book.create')" icon="fa fa-hand-holding-heart">Sumbang Buku</NavLink>
          </li>
          <li class="items-center">
            <NavLink :href="route('penalties.show', 32)" :active="route().current('penalties.show')" icon="fas fa-file-invoice-dollar">Tagihan Denda</NavLink>
          </li>
          <li class="items-center">
            <NavLink :href="route('user.index')" :active="route().current('user.index')" icon="fas fa-users">Member</NavLink>
          </li>
          <li class="items-center">
            <NavLink :href="route('book.index')" :active="route().current('book.index')" icon="fas fa-stream">Tabel Buku</NavLink>
          </li>
          <li class="items-center">
            <NavLink :href="route('book-borrow.get-all')" :active="route().current('book-borrow.get-all')" icon="fas fa-th-list">List Buku Dipinjam</NavLink>
          </li>
          <li class="item-center">
            <NavLink :href="route('penalties.index')" :active="route().current('penalties.index')" icon="fas fa-money-bill-wave">List Denda</NavLink>
          </li>
          <li class="item-center">
            <NavLink :href="route('donate-book.index')" :active="route().current('donate-book.index')" icon="fas fa-book-open">List Donasi Buku</NavLink>
          </li>
          <li class="item-center">
            <NavLink :href="route('announcement.index')" :active="route().current('announcement.index')" icon="fas fa-bullhorn">Pengumuman</NavLink>
          </li>
          <li class="item-center">
            <NavLink :href="route('statistics.index')" :active="route().current('statistics.index')" icon="fas fa-chart-bar">Statistik</NavLink>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
<script>
import UserDropdownComponent from "@/Components/Main/UserDropdown.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
import NavLink from "@/Components/Main/NavLink.vue";

export default {
  data() {
    return {
      collapseShow: "hidden",
    };
  },
  methods: {
    toggleCollapseShow: function (classes) {
      this.collapseShow = classes;
    },
  },
  components: {
    ApplicationLogo,
    UserDropdownComponent,
    Link,
	  NavLink,
  },
};
</script>