<template>
  <AuthLayout>
    <!-- Add Here -->
    <div class="tabs shadow-md">
      <a class="tab tab-lifted tab-active">Profile</a>
      <a class="tab tab-lifted">Password</a>
      <a class="tab tab-lifted">Info</a>
    </div>
    <div class="grid grid-cols-6 gap-4 bg-gray-50 h-full">
      <div class="col-start-1 col-span-1 ...">
        <h2 class="font-semibold text-2xl leading-tight mt-5 ml-5">
          Profil Anda
        </h2>
      </div>
      <div class="col-start-1 col-end-3 mt-5 ml-5 ...">
        KOKOH AKU GATAU MASUKIN FOTO DISINI GIMANA, BENTAR DULU AKU MAU NYARI
      </div>
      <div class="col-end-7 col-span-2...">3</div>
      <div class="col-start-1 col-end-4 mt-5 ml-5 ...">
        <div class="form-control">
          <label class="label">
            <span class="label-text">Username</span>
          </label>
          <input
            type="text"
            placeholder="Username"
            class="input input-primary input-bordered rounded-full input-md"
          />
        </div>
      </div>
      <div class="col-start-4 col-end-7 mt-5 mr-5 ...">
        <div class="form-control">
          <label class="label">
            <span class="label-text">Nama</span>
          </label>
          <input
            type="text"
            placeholder="Nama"
            class="input input-primary input-bordered rounded-full input-md"
          />
        </div>
      </div>
      <div class="col-start-1 col-end-4 mt-3 ml-5 ...">
        <div class="form-control">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input
            type="text"
            placeholder="Email"
            class="input input-primary input-bordered rounded-full input-md"
          />
        </div>
      </div>

      <div class="col-start-4 col-end-7 mt-3 mr-5 ...">
        <div class="form-control">
          <label class="label">
            <span class="label-text">Status</span>
          </label>
          <input
            type="text"
            placeholder="User"
            disabled="disabled"
            class="input input-bordered input-md"
          />
        </div>
      </div>
    </div>
    <button class="btn rounded-full mt-10 ml-5">Simpan</button>
    <button class="btn btn-outline rounded-full ml-5 mb-10">Urungkan</button>
  </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import UserTable from "@/Components/Tables/UserTable.vue";
import MemberEntry from "@/Components/Forms/MemberEntry.vue";

export default {
  components: {
    AuthLayout,
    UserTable,
    MemberEntry,
  },
};
</script>
