<template>
    <Head title="Profile" />
    <AuthLayout title="Profile">
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
            <div class="w-full h-full">
                <div class="bg-white h-full rounded-xl shadow-md p-10">
                    <h2 class="text-xl mb-5">Ubah Profile</h2>
                    <form @submit.prevent="profileSubmit" class="grid gap-4">           
                        <div class="w-full grid grid-cols-1 xl:grid-cols-3 gap-5">
                            <div class="col-span-1">
                                <div class="grid justify-items-center w-3/2 ">
                                    <div class="avatar">
                                        <div class="mb-8 rounded-box w-full h-auto ring ring-primary ring-offset-base-100 ring-offset-2">
                                            <img :src="image">
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
                                        <button @click="reset" type="button" class="btn btn-outline btn-error inline-block ml-3">Reset</button>
                                        <p class="ml-3 text-sm text-red-500" v-if="form.errors.image">{{form.errors.image}}</p>
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
                                    v-model.number="userDetail.department_id"
                                >
                                    <option disabled="disabled" selected="selected">
                                        Pilih Kondisi
                                    </option>
                                    <option value="1">D3 Informatika</option>
                                    <option value="2">D3 Multimedia</option>
                                </select>
                                <p class="ml-3 text-sm text-red-500" v-if="userDetail.errors.department_id">{{userDetail.errors.department_id}}</p>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">NRP</span>
                                </label>
                                <input
                                    type="text"
                                    placeholder="NRP"
                                    class="input input-primary input-bordered"
                                    v-model="userDetail.nrp"
                                />
                                <p class="ml-3 text-sm text-red-500" v-if="userDetail.errors.nrp">{{userDetail.errors.nrp}}</p>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Alamat</span>
                            </label>
                            <textarea
                                class="textarea h-24 textarea-bordered textarea-primary"
                                placeholder="Alamat Anda"
                                v-model="userDetail.address"
                            ></textarea>
                            <p class="ml-3 text-sm text-red-500" v-if="userDetail.errors.address">{{userDetail.errors.address}}</p>
                        </div>
                        <button class="btn btn-primary justify-self-end">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
            <!-- <div class="w-full h-full"> 
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
            </div> -->
        </div>
    </AuthLayout>
</template>

<script>
import { Head } from "@inertiajs/inertia-vue3"
import AuthLayout from "@/Layouts/Authenticated.vue";

export default {
    components: {
        Head,
        AuthLayout,
    
    },
    data() {
        return {
            form: this.$inertia.form({
                email: this.$page.props.auth.user.email,
                name: this.$page.props.auth.user.name,
                image: this.$page.props.auth.user.image,
                _method: 'PUT',
            }),
            userDetail: this.$inertia.form(this.detail),
            formPassword: this.$inertia.form({
                currentPassword: '',
                newPassword: '',
                confirmPassword: '',
            }),
            image: this.$page.props.auth.user.image,
        }
    },
    props: {
        detail: {
            type: Object,
            default: {
                department_id: 0,
                nrp: '',
                address: '',
            }

        }
    }, 
    methods: {
        uploadedImage(event) {
            var img = event.target.files[0];
            this.form.image = img;
            this.image = URL.createObjectURL(img);
        },
        reset() {
            this.form.reset();
            this.userDetail.reset();
            this.image = this.$page.props.auth.user.image;

        }, 
        profileSubmit() {
            if (typeof this.form.image == 'string') {
                delete this.form.image;
            }

            this.form.post(route('profile.update', this.$page.props.auth.user.id), {
                onSuccess: page => {
                    this.$inertia.reload();
                    this.userDetail.post(route('profile.store'));
                }
            });
        }
    }
};
</script>
