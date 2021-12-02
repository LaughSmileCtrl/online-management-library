<template>
    <AuthLayout>
        <div class="py-5">
            <Link :href="route('announcement.index')" class="btn">
                <i class="fas fa-arrow-left"></i>&nbsp; Kembali
            </Link>
        </div>
        <div class="p-7 w-full md:w-1/2 bg-white rounded-lg">
            <form @submit.prevent="submit">
                <h1 class="text-2xl">Pengumuman</h1>
                <div class="form-control my-3">
                    <label class="label">
                        <span class="label-text">Judul</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Judul"
                        class="input input-primary input-bordered"
                        autofocus
                        name="title"
                        v-model="form.title"
                    />
                    <p class="ml-3 text-sm text-red-500" v-if="form.errors.title">{{ form.errors.title }}</p>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Jenis</span>
                    </label>
                    <select
                        class="
                            select select-bordered select-primary
                            w-full
                        "
                        v-model.number="form.type_id"
                    >
                        <option disabled="disabled" selected="selected">
                            Pilih Jenis Pengumuman
                        </option>
                        <option value="1">Info</option>
                        <option value="2">Peringatan</option>
                    </select>
                    <p class="ml-3 text-sm text-red-500" v-if="form.errors.type_id">{{ form.errors.type_id }}</p>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Pesan</span>
                    </label>
                    <textarea
                        class="textarea h-24 textarea-bordered textarea-primary"
                        placeholder="Pesan"
                        name="message"
                        v-model="form.message"
                    ></textarea>
                    <p class="ml-3 text-sm text-red-500" v-if="form.errors.message">{{ form.errors.message }}</p>
                </div>
                <button class="btn btn-primary btn-block my-5">Simpan</button>
            </form>
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    data() {
        return {
            form: this.$inertia.form(this.announcement),
        };
    },
    components: {
        AuthLayout,
        Link,
    },
    props: {
        announcement : {
            type: Object,
            default: {
                title: '',
                type_id: 0,
                message: '',
            }
        },
        formConfig: Object,
    },
    methods: {
         submit() {           
            this.form.submit(this.formConfig.method, this.formConfig.url, {
                onSuccess: page => {
                    this.form.reset();
                    this.$swal(page.props.flash.message, '', 'success');
                    this.$inertia.get(route('announcement.index'));
                }
            });

        }
    }
    
};
</script>
