<template>
    <div>
        <div class="p-7">
            <div class="form-control my-3">
                <label class="label">
                    <span class="label-text">Nama</span>
                </label>
                <input
                    type="text"
                    placeholder="nama"
                    class="input input-primary input-bordered"
                    autofocus
                />
            </div>
            <div class="form-control my-3">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input
                    type="text"
                    placeholder="email"
                    class="input input-primary input-bordered"
                />
            </div>
            <div class="form-control my-3">
                <label class="label">
                    <span class="label-text">NRP</span>
                </label>
                <input
                    type="text"
                    placeholder="nrp"
                    class="input input-primary input-bordered"
                />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Jurusan</span>
                </label>
                <select
                    class="
                        select select-bordered select-primary
                        w-full
                        max-w-xs
                    "
                >
                    <option disabled="disabled" selected="selected">
                        Pilih Jurusan
                    </option>
                    <option>D3 Informatika</option>
                    <option>D3 Multimedia</option>
                </select>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Alamat</span>
                </label>
                <textarea
                    class="textarea h-24 textarea-bordered textarea-primary"
                    placeholder="alamat"
                ></textarea>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            imgIconClass: "fa fa-file-upload fa-5x text-gray-700",
            imgClass: "hidden",
            imgSrc: null,
            imgName: "Gambar belum dipilih",
        };
    },
    methods: {
        //   access via ref in parent
        showImg(img) {
            this.$swal("lol");
            this.imgIconClass = "hidden";
            this.imgClass = "h-56";
            this.imgSrc = URL.createObjectURL(img);
            this.imgName = img.name;
        },
    },
};
</script>