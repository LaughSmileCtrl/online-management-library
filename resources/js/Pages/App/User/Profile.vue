<template>
  <Head title="Profile" />
  <AuthLayout title="Profile">
    <!-- Add Here -->
    <div class="tabs shadow-md">
      <a class="tab tab-lifted tab-active">Profile</a>
      <a class="tab tab-lifted">Password</a>
      <a class="tab tab-lifted">Info</a>
    </div>
    <div class="grid grid-cols-6 gap-4 bg-gray-50 h-full shadow-md">
      <div class="col-start-1 col-span-1 ...">
        <h2 class="font-semibold text-2xl leading-tight mt-5 ml-5">
          Profil Anda
        </h2>
      </div>
      <div class="col-start-1 col-end-3 mt-5 ml-7 ...">
        <div class="avatar">
          <div
            class="
              mb-8
              rounded-box
              w-24
              h-24
              ring ring-primary ring-offset-base-100 ring-offset-2
            "
          >
            <img
              src="http://daisyui.com/tailwind-css-component-profile-1@94w.png"
            />
          </div>
        </div>
      </div>
      <div class="col-start-1 col-end-3 ml-7 ...">
        <button class="btn btn-xs rounded-full -m-2.5">Unggah</button>
      </div>
      <div class="col-start-1 col-end-4 mt-5 ml-5 ...">
        <div class="form-control">
          <label class="label">
            <span class="label-text">Username</span>
          </label>
          <input
            type="text"
            placeholder="Username"
            class="input input-primary input-bordered input-md"
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
            class="input input-primary input-bordered input-md"
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
            class="input input-primary input-bordered input-md"
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
            class="input input-primary input-bordered input-md"
          />
        </div>
      </div>
      <div class="col-start-1 mt-5 ...">
        <button class="btn btn-primary ml-5 mb-7">SIMPAN</button>
      </div>
      <div class="col-start-2 mt-5 ...">
        <button class="btn btn-outline mb-7">URUNGKAN</button>
      </div>
    </div>
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
