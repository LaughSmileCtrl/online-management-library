<template>
    <Head title="Form Input Buku" />
    <AuthLayout title="Form Buku">
        <div class="py-5">
            <Link
                :href="route(prefix + '.index')"
                class="btn"
                v-if="!route().current('donate-book.create')"
            >
                <i class="fas fa-arrow-left"></i>&nbsp; Kembali
            </Link>
        </div>
        <div class="w-full 2xl:w-1/2 my-10 bg-white rounded-lg h-full p-3">
            <h1 class="text-2xl pt-5 pl-5">Form buku</h1>
            <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-3 gap-1">
                <div class="flex items-center">
                    <div class="flex flex-wrap justify-center">
                        <div class="flex justify-center h-64 w-48 rounded-lg p-2 m-4">
                            <img :src="imgSrc" class="rounded-lg" alt="Cover" srcset="">
                        </div>
                        <div class="w-full md:px-3 px-16">
                            <label class="btn btn-primary btn-block">
                                <span><i class="fas fa-cloud-upload-alt mr-2"></i>Pilih gambar 
                                </span>
                                <input type="file" class="hidden" accept=".jpg, .jpeg, .png"  @change="uploadedImage($event)"/>
                            </label>
                        </div>
                        <div class="w-full text-center">
                            <p class="opacity-70 text-sm" v-if="imgName">{{ imgName }}</p>
                            <p class="opacity-70 text-sm" v-else>
                                Silahkan pilih cover buku dengan format jpg, png atau jpeg
                                dengan ukuran maksimal 1mb
                            </p>
                            <p v-if="errors.image" class="text-red-500 text-sm">{{ errors.image }}</p>
                        </div>
                    </div>
                </div>
                    <div class="grid col-span-2 p-8">
                        <button type="button" class="btn btn-sm btn-outline btn-error mb-3 justify-self-end" @click="reset">Reset</button>
                        <div class="form-control my-3">
                            <label class="label"><span class="label-text">Judul Buku</span></label>
                            <input type="text" v-model="form.title" placeholder="Judul Buku" class="input input-primary input-bordered" autofocus="" />
                            <p v-if="errors.title" class="text-red-500 text-sm ml-3">{{ errors.title }}</p>
                        </div>
                        <div class="form-control my-3">
                            <label class="label"><span class="label-text">ISBN</span></label>
                            <input type="text" v-model="form.isbn" placeholder="ISBN" class="input input-primary input-bordered" />
                            <p v-if="errors.isbn" class="text-red-500 text-sm ml-3">{{ errors.isbn }}</p>
                        </div>
                        <div class="form-control my-3">
                            <label class="label"><span class="label-text">Penulis</span></label>
                            <input type="text" v-model="form.author" placeholder="Penulis" class="input input-primary input-bordered" />
                            <p v-if="errors.author" class="text-red-500 text-sm ml-3">{{ errors.author }}</p>
                        </div>
                        <div class="form-control my-3">
                            <label class="label"><span class="label-text">Penerbit</span></label>
                            <input type="text" v-model="form.publisher" placeholder="Penerbit" class="input input-primary input-bordered" />
                            <p v-if="errors.publisher" class="text-red-500 text-sm ml-3">{{ errors.publisher }}</p>
                        </div>
                        <div class="my-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="form-control">
                                <label class="label"><span class="label-text">Tahun terbit</span></label>
                                <input type="text" v-model="form.year" placeholder="Tahun Terbit" class="input input-primary input-bordered" />
                                <p v-if="errors.year" class="text-red-500 text-sm ml-3">{{ errors.year }}</p>
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text">Jumlah</span></label>
                                <input type="number" v-model="form.quantity" placeholder="Jumlah" class="input input-primary input-bordered" />
                                <p v-if="errors.quantity" class="text-red-500 text-sm ml-3">{{ errors.quantity }}</p>
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text">Kondisi</span></label
                                ><select class="select select-bordered select-primary w-full max-w-xs" v-model="form.condition_id">
                                    <option disabled="">Pilih Kondisi</option>
                                    <option value="1">Baru</option>
                                    <option value="2">Bekas</option>
                                    <option value="3">Rusak (Bisa Dipakai)</option>
                                    <option value="4">Rusak Parah</option>
                                </select>
                                <p v-if="errors.condition_id" class="text-red-500 text-sm ml-3">{{ errors.condition_id }}</p>
                            </div>
                            <div class="form-control">
                                <label class="label"><span class="label-text">Kategori</span></label
                                ><select class="select select-bordered select-primary w-full max-w-xs" v-model="form.category_id">
                                    <option disabled="">Pilih Kategori</option>
                                    <option value="1">Buku Islam </option>
                                    <option value="2">Buku Rohani Kristen </option>
                                    <option value="3">Buku Anak </option>
                                    <option value="4">Buku Sekolah </option>
                                    <option value="5">Bahasa & Kamus </option>
                                    <option value="6">Biografi & Memoar </option>
                                    <option value="7">Bisnis & Keuangan </option>
                                    <option value="8">Hobi & Keterampilan </option>
                                    <option value="9">Hukum </option>
                                    <option value="10">Kedokteran & Kesehatan </option>
                                    <option value="11">Komputer & Internet </option>
                                    <option value="12">Novel & Sastra </option>
                                    <option value="13">Pertanian & Lingkungan Hidup </option>
                                    <option value="14">Pendidikan & Keguruan </option>
                                    <option value="15">Psikologi & Pengembangan Diri </option>
                                    <option value="16">Referensi & Ensiklopedi </option>
                                    <option value="17">Sejarah, Budaya & Filsafat </option>
                                    <option value="18">Sosial & Politik </option>
                                    <option value="19">Teknik & Ilmu Pengetahuan </option>
                                    <option value="20">Buku Umum</option>
                                    <option value="21">Buku Obral</option>
                                </select>

                                <p v-if="errors.category_id" class="text-red-500 text-sm ml-3">{{ errors.category_id }}</p>
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="label"><span class="label-text">Deskripsi</span></label>
                            <textarea v-model="form.description" class="textarea h-24 textarea-bordered textarea-primary" placeholder="Deskripsi Buku"></textarea>
                            <p v-if="errors.description" class="text-red-500 text-sm ml-3">{{ errors.description }}</p>
                        </div>
                        <button class="btn btn-primary btn-block my-5">Simpan</button>
                    </div>
                </form>

        </div>
    </AuthLayout>
</template>

<script>
import { Link, Head } from "@inertiajs/inertia-vue3";
import AuthLayout from "@/Layouts/Authenticated.vue";

export default {
    components: {
        AuthLayout,
        Link,
        Head,
    },
    data() {
        return {
            form: this.$inertia.form(this.book),
            imgSrc: this.book.image,
            imgName: '',
        };
    },
    computed: {
        prefix() {
            return route().current("book.*") ? "book" : "donate-book";
        },
    },
    props: {
        book: {
            type: Object,
            default: {
                title: '',
                isbn: '',
                author: '',
                publisher: '',
                year: '',
                quantity: 0,
                condition_id: 0,
                category_id: 0,
                description: '',
                image: '/images/books/cover.jpg',
            },
        },
        errors: Object,
        url: {
            type: String,
            required: true,
        }
    },
    methods: {
        reset() {
            this.form.reset();
        },
        uploadedImage(event) {
            var img = event.target.files[0];
            this.form.image = img;
            this.imgSrc = URL.createObjectURL(img);
            this.imgName = img.name;
        },
        submit() {;
            if (typeof this.form.image == 'string') {
                delete this.form.image;
            }

            this.$inertia.post(this.url, this.form, {
                onSuccess: (page) => {
                    this.form.reset();
                    this.imgSrc= this.book.image;
                    this.imgName= '';
                    this.$swal(page.props.flash.message, "", "success");
                },
            });
        },
    },
};
</script>
