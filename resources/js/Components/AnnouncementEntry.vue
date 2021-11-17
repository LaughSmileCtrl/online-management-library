<template>
    <div>
        <div class="p-7">
            <h1 class="text-2xl">Tambah Pengumuman</h1>
            <div class="form-control my-3">
                <label class="label">
                    <span class="label-text">Judul</span>
                </label>
                <input
                    type="text"
                    placeholder="judul"
                    class="input input-primary input-bordered"
                    autofocus
                />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Jenis</span>
                </label>
                <select
                    class="
                        select select-bordered select-primary
                        w-full
                        max-w-xs
                    "
                >
                    <option disabled="disabled" selected="selected">
                        Pilih Jenis Pengumuman
                    </option>
                    <option>Info</option>
                    <option>Peringatan</option>
                </select>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Pesan</span>
                </label>
                <textarea
                    class="textarea h-24 textarea-bordered textarea-primary"
                    placeholder="pesan"
                ></textarea>
            </div>
            <button class="btn btn-primary btn-block my-5">Simpan</button>
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