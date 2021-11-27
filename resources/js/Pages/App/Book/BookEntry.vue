<template>
    <AuthLayout>
        <div class="py-5">
            <Link :href="route(prefix+'.index')" class="btn" v-if="!route().current('donate-book.create')">
                <i class="fas fa-arrow-left"></i>&nbsp; Kembali
            </Link>
        </div>
        <div
            class="
                flex flex-wrap
                w-full
                2xl:w-1/2
                my-10
                bg-white
                rounded-lg
                justify-center
                items-center
                h-full
            "
        >

            <div class="flex flex-wrap justify-center w-2/3 md:w-1/3 h-full">
                <div
                    class="
                        flex
                        justify-center
                        items-center
                        h-60
                        w-48
                        bg-gray-400
                        rounded-lg
                        sm:ml-10
                    "
                >
                    <i :class="imgIconClass"></i>
                    <img :src="imgSrc" :class="imgClass" />
                </div>
                <div class="form-control w-auto items-center w-1/2 mt-3 sm:ml-10">
                    <label
                        class="
                            w-48
                            flex flex-col
                            items-center
                            rounded-md
                            shadow-md
                            tracking-wide
                            uppercase
                            border border-primary
                            cursor-pointer
                            bg-neutral
                            hover:bg-primary hover:text-white
                            text-primary
                            ease-linear
                            transition-all
                            duration-150
                            py-2
                        "
                    >
                        <span
                            ><i class="fas fa-cloud-upload-alt"></i> Pilih
                            gambar</span
                        >
                        <input
                            type="file"
                            class="hidden"
                            accept=".jpg, .jpeg, .png"
                            @change="uploadedImage($event)"
                        />
                    </label>
                </div>
                <div class="w-full opacity-70 text-center sm:ml-10">
                    <p>{{ imgName }}</p>
                </div>
            </div>
            <div class="w-2/3 px-10 py-8 grid">
                <button @click="form.reset()" type="button" class="btn btn-sm btn-outline btn-error mb-3 justify-self-end">Reset</button>
                <form @submit.prevent="submit">
                    <div class="form-control my-3">
                        <label class="label">
                            <span class="label-text">Judul Buku</span>
                        </label>
                        <input
                            type="text"
                            placeholder="Judul Buku"
                            class="input input-primary input-bordered"
                            name="title"
                            autofocus
                            v-model="form.title"
                        />
                        <p class="ml-3 text-sm text-red-500" v-if="form.errors.title">{{form.errors.title}}</p>
                    </div>
                    <div class="form-control my-3">
                        <label class="label">
                            <span class="label-text">ISBN</span>
                        </label>
                        <input
                            type="text"
                            placeholder="ISBN"
                            class="input input-primary input-bordered"
                            name="isbn"
                            v-model="form.isbn"
                        />
                        <p class="ml-3 text-sm text-red-500" v-if="form.errors.isbn">{{form.errors.isbn}}</p>
                    </div>
                    <div class="form-control my-3">
                        <label class="label">
                            <span class="label-text">Penulis</span>
                        </label>
                        <input
                            type="text"
                            placeholder="Penulis"
                            class="input input-primary input-bordered"
                            name="author"
                            v-model="form.author"
                        />
                        <p class="ml-3 text-sm text-red-500" v-if="form.errors.author">{{form.errors.author}}</p>
                    </div>
                    <div class="form-control my-3">
                        <label class="label">
                            <span class="label-text">Penerbit</span>
                        </label>
                        <input
                            type="text"
                            placeholder="Penerbit"
                            class="input input-primary input-bordered"
                            name="publisher"
                            v-model="form.publisher"
                        />
                        <p class="ml-3 text-sm text-red-500" v-if="form.errors.publisher">{{form.errors.publisher}}</p>
                    </div>
                    <div class="my-3 grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Tahun terbit</span>
                            </label>
                            <input
                                type="text"
                                placeholder="Tahun Terbit"
                                class="input input-primary input-bordered"
                                name="year"
                                v-model="form.year"
                            />
                            <p class="ml-3 text-sm text-red-500" v-if="form.errors.year">{{form.errors.year}}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Jumlah</span>
                            </label>
                            <input
                                type="number"
                                placeholder="Jumlah"
                                class="input input-primary input-bordered"
                                name="quantity"
                                v-model="form.quantity"
                            />
                            <p class="ml-3 text-sm text-red-500" v-if="form.errors.quantity">{{form.errors.quantity}}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Kondisi</span>
                            </label>
                            <select
                                class="
                                    select select-bordered select-primary
                                    w-full
                                    max-w-xs
                                "
                                name="condition_id"
                                v-model.number="form.condition_id"
                            >
                                <option disabled="disabled" selected="selected">
                                    Pilih Kondisi
                                </option>
                                <option value="1">Baru</option>
                                <option value="2">Bekas</option>
                                <option value="3">Tidak Lengkap</option>
                            </select>
                            <p class="ml-3 text-sm text-red-500" v-if="form.errors.condition_id">{{form.errors.condition_id}}</p>
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Kategori</span>
                            </label>
                            <select
                                class="
                                    select select-bordered select-primary
                                    w-full
                                    max-w-xs
                                "
                                name="category_id"
                                v-model.number="form.category_id"
                            >
                                <option disabled="disabled" selected="selected">
                                    Pilih Kategori
                                </option>
                                <option value="1">Politik</option>
                                <option value="2">Hukum</option>
                                <option value="3">Sains</option>
                            </select>
                            <p class="ml-3 text-sm text-red-500" v-if="form.errors.category_id">{{form.errors.category_id}}</p>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Deskripsi</span>
                        </label>
                        <textarea
                            class="textarea h-24 textarea-bordered textarea-primary"
                            placeholder="Deskripsi Buku"
                            name="description"
                            v-model="form.description"
                        ></textarea>
                        <p class="ml-3 text-sm text-red-500" v-if="form.errors.description">{{form.errors.description}}</p>
                    </div>
                    <button class="btn btn-primary btn-block my-5">
                        Simpan
                    </button>
                </form>
            </div>
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
            imgIconClass: "fa fa-file-upload fa-5x text-gray-700",
            imgClass: "hidden",
            imgSrc: null,
            imgName: "Gambar belum dipilih",
            form: this.$inertia.form(this.book),
        };
    },
    computed : {
        prefix() {
            return (route().current('book.*')) 
                ? 'book'
                : 'donate-book';
        }
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
                },
        }, 
        formConfig: Object,
	},
    methods: {
        uploadedImage(event){
            var img = event.target.files[0];

            this.imgIconClass = "hidden";
            this.imgClass = "h-56";
            this.imgSrc = URL.createObjectURL(img);
            this.imgName = img.name;
        },
        submit() {
            this.form.submit(this.formConfig.method, this.formConfig.url, {
                onSuccess: page => {
                    this.form.reset();
                    this.$swal(page.props.flash.message, '', 'success');
                }
            });

        }
    },
};
</script>