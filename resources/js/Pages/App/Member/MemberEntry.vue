<template>
    <AuthLayout>
        <div class="py-5">
            <Link :href="route('user.index')" class="btn">
                <i class="fas fa-arrow-left"></i>&nbsp; Kembali
            </Link>
        </div>
        <div class="p-7 w-full md:w-1/2 bg-white rounded-lg">
            <form @submit.prevent="submit">
                <div class="form-control my-3">
                    <label class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <input
                        type="text"
                        placeholder="nama"
                        class="input input-primary input-bordered"
                        v-model="form.name"
                        autofocus
                    />
                    <p class="ml-3 text-sm text-red-500" v-if="form.errors.name">{{ form.errors.name }}</p>
                </div>
                <div class="form-control my-3">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input
                        type="text"
                        placeholder="email"
                        class="input input-primary input-bordered"
                        v-model="form.email"
                    />
                    <p class="ml-3 text-sm text-red-500" v-if="form.errors.email">{{ form.errors.email }}</p>
                </div>
                <div class="form-control my-3">
                    <label class="label">
                        <span class="label-text">NRP</span>
                    </label>
                    <input
                        type="text"
                        placeholder="nrp"
                        class="input input-primary input-bordered"
                        v-model="form.nrp"
                    />
                    <p class="ml-3 text-sm text-red-500" v-if="form.errors.nrp">{{ form.errors.nrp }}</p>
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
                            Pilih Jurusan
                        </option>
                        <option value="1">D3 Informatika</option>
                        <option value="3">D3 Multimedia</option>
                    </select>
                    <p class="ml-3 text-sm text-red-500" v-if="form.errors.department">{{ form.errors.department }}</p>
                </div>
                <button class="btn btn-primary btn-block my-5">
                    Simpan
                </button>
            </form>
        </div>
    </AuthLayout>

</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/Authenticated.vue";

export default {
    components: {
        AuthLayout,
        Link,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                nrp: '',
                department_id: 0,
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('user.store'), {
                onSuccess: page => {
                    this.form.reset();
                    this.$swal(page.props.flash.message, '', 'success');
                }
            });

        }
    }
};
</script>