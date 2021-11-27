<template>
    <Head title="Profile" />
    <AuthLayout title="Profile">
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
            <div class="w-full h-full">
                <div class="bg-white h-full rounded-xl shadow-md p-10">
                    <h2 class="text-xl mb-5">Ubah Profile</h2>
                    <form @submit.prevent="submit" class="grid gap-4">           
                        <div class="w-full grid grid-cols-1 xl:grid-cols-3 gap-5">
                            <div class="col-span-1">
                                <div class="grid justify-items-center">
                                    <div class="avatar">
                                        <div class="mb-8 rounded-box w-full h-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                            <img src="http://daisyui.com/tailwind-css-component-profile-1@94w.png">
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-span-2 ">
                                <div class="h-full grid justify-items-center xl:justify-items-start">
                                    <div class="h-1/2 my-auto">
                                        <label class="btn btn-primary">
                                            <span><i class="fas fa-cloud-upload-alt"></i> Pilih gambar</span>
                                            <input
                                                type="file"
                                                class="hidden"
                                                accept=".jpg, .jpeg, .png"
                                                @change="uploadedImage($event)"
                                            />
                                        </label>
                                        <button @click="form.reset()" type="button" class="btn btn-outline btn-error inline-block ml-3">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input
                                    type="text"
                                    placeholder="Email"
                                    class="input input-primary input-bordered"
                                    v-model="form.email"
                                />
                                <p class="ml-3 text-sm text-red-500" v-if="form.errors.email">{{form.errors.email}}</p>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Nama</span>
                                </label>
                                <input
                                    type="text"
                                    placeholder="Nama"
                                    class="input input-primary input-bordered"
                                    v-model="form.name"
                                />
                                <p class="ml-3 text-sm text-red-500" v-if="form.errors.name">{{form.errors.name}}</p>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Jurusan</span>
                                </label>
                                <select
                                    class="
                                        select select-bordered select-primary
                                        w-full
                                    "
                                    v-model.number="form.department_id"
                                >
                                    <option disabled="disabled" selected="selected">
                                        Pilih Kondisi
                                    </option>
                                    <option value="1">D3 Informatika</option>
                                    <option value="2">D3 Multimedia</option>
                                </select>
                                <p class="ml-3 text-sm text-red-500" v-if="form.errors.department_id">{{form.errors.department_id}}</p>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">NRP</span>
                                </label>
                                <input
                                    type="text"
                                    placeholder="NRP"
                                    class="input input-primary input-bordered"
                                    v-model="form.nrp"
                                />
                                <p class="ml-3 text-sm text-red-500" v-if="form.errors.nrp">{{form.errors.nrp}}</p>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Alamat</span>
                            </label>
                            <textarea
                                class="textarea h-24 textarea-bordered textarea-primary"
                                placeholder="Alamat Anda"
                                v-model="form.address"
                            ></textarea>
                            <p class="ml-3 text-sm text-red-500" v-if="form.errors.address">{{form.errors.address}}</p>
                        </div>
                        <button class="btn btn-primary justify-self-end">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
            <div class="w-full h-full"> 
                <div class="bg-white rounded-xl shadow-md p-10">
                    <h2 class="text-xl mb-5">Ubah Password</h2>
                    <form @submit.prevent="submitPassword" class="grid gap-5">               
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password saat ini</span>
                            </label>
                            <input
                                type="text"
                                placeholder="Password saat ini"
                                class="input input-primary input-bordered"
                                v-model="formPassword.currentPassword"
                            />
                            <p class="ml-3 text-sm text-red-500" v-if="formPassword.errors.currentPassword">{{formPassword.errors.currentPassword}}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Pasword baru</span>
                            </label>
                            <input
                                type="text"
                                placeholder="Pasword baru"
                                class="input input-primary input-bordered"
                                v-model="formPassword.newPassword"
                            />
                            <p class="ml-3 text-sm text-red-500" v-if="formPassword.errors.newPassword">{{formPassword.errors.newPassword}}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Konfirmasi Password baru</span>
                            </label>
                            <input
                                type="text"
                                placeholder="Konfirmasi Password baru"
                                class="input input-primary input-bordered"
                                v-model="formPassword.confirmPassword"
                            />
                            <p class="ml-3 text-sm text-red-500" v-if="formPassword.errors.confirmPassword">{{formPassword.errors.confirmPassword}}</p>
                        </div>
                            
                        <button class="btn btn-primary justify-self-end">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";

export default {
    components: {
        AuthLayout,
    
    },
    data() {
        return {
            form: this.$inertia.form(this.user),
            formPassword: this.$inertia.form({
                currentPassword: '',
                newPassword: '',
                confirmPassword: '',
            })
        }
    },
    props: {
        user: {
            type: Object,
            default: {
                email: '',
                name: '',
                department_id: 0,
                nrp: '',
                address: '',
            }
        },
    }
};
</script>
