<template>
  <Head title="Anggota" />
  <AuthLayout title="Anggota">
    <div id="user-table" v-show="onMain" class="mb-10">
      <div class="z-10 py-5">
        <button class="btn btn-primary my-5" @click="addUser">
          <i class="fa fa-plus"></i>&nbsp; Tambah User
        </button>
      </div>
      <UserTable @editBook="actionEdit" @deleteBook="actionDelete" />
    </div>

    <div id="add-book" v-show="!onMain">
      <div class="py-5">
        <button class="btn" @click="actionEdit">
          <i class="fas fa-arrow-left"></i>&nbsp; Kembali
        </button>
      </div>
      <div
        class="
          xl:w-1/2
          my-10
          bg-white
          rounded-lg
          justify-center
          items-center
          h-full
          p-5
        "
      >
        <MemberEntry />
        <button class="btn btn-primary btn-block">Simpan</button>
      </div>
    </div>
  </AuthLayout>
  <MemberEntry v-show="false" ref="memberEntry" />
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import UserTable from "@/Components/Tables/UserTable.vue";
import MemberEntry from "@/Components/Forms/MemberEntry.vue";

export default {
  data() {
    return {
      onMain: true,
    };
  },
  components: {
    AuthLayout,
    UserTable,
    MemberEntry,
  },
  methods: {
    addUser() {
      this.$swal({
        title: "Tambah Member",
        width: "48rem",
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: "Simpan",
        cancelButtonText: "Batal",
        reverseButtons: true,
        html: this.$refs.memberEntry.$el.innerHTML,
      });
    },
    actionEdit() {
      this.onMain = !this.onMain;
    },
    actionDelete() {
      this.$swal({
        title: "Anda yakin?",
        text: "Apakah anda benar akan mwnghapus buku ini?",
        icon: "qustion",
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: "Ya, hapus",
        cancelButtonText: "Tidak",
        reverseButtons: true,
      }).then((result) => {
        if (result.isConfirmed) {
          this.$swal("Tersimpan", "", "success");
        }
      });
    },
  },
};
</script>
