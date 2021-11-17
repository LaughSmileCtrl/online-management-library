<template>
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
        "
      >
        <i :class="imgIconClass"></i>
        <img :src="imgSrc" :class="imgClass" />
      </div>
      <div class="form-control w-auto items-center w-1/2 mt-3">
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
          <span><i class="fas fa-cloud-upload-alt"></i> Pilih gambar</span>
          <input
            type="file"
            class="hidden"
            accept=".jpg, .jpeg, .png"
            @change="$emit('uploadedImage', $event)"
          />
        </label>
        <p>{{ imgName }}</p>
      </div>
    </div>
    <div class="w-2/3 px-10 py-8">
      <div class="form-control my-3">
        <label class="label">
          <span class="label-text">Judul Buku</span>
        </label>
        <input
          type="text"
          placeholder="Judul Buku"
          class="input input-primary input-bordered"
          autofocus
        />
      </div>
      <div class="form-control my-3">
        <label class="label">
          <span class="label-text">Penulis</span>
        </label>
        <input
          type="text"
          placeholder="Penulis"
          class="input input-primary input-bordered"
        />
      </div>
      <div class="form-control my-3">
        <label class="label">
          <span class="label-text">Penerbit</span>
        </label>
        <input
          type="text"
          placeholder="Penerbit"
          class="input input-primary input-bordered"
        />
      </div>
      <div class="my-3 grid grid-cols-1 md:grid-cols-3 gap-x-3">
        <div class="form-control">
          <label class="label">
            <span class="label-text">Tahun terbit</span>
          </label>
          <input
            type="text"
            placeholder="Tahun Terbit"
            class="input input-primary input-bordered"
          />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Jumlah</span>
          </label>
          <input
            type="number"
            placeholder="Jumlah"
            class="input input-primary input-bordered"
          />
        </div>
        <div class="form-control">
          <label class="label">
            <span class="label-text">Kondisi</span>
          </label>
          <select class="select select-bordered select-primary w-full max-w-xs">
            <option disabled="disabled" selected="selected">
              Pilih Kondisi
            </option>
            <option>Baru</option>
            <option>Bekas</option>
          </select>
        </div>
      </div>
      <div class="form-control">
        <label class="label">
          <span class="label-text">Deskripsi</span>
        </label>
        <textarea
          class="textarea h-24 textarea-bordered textarea-primary"
          placeholder="Deskripsi Buku"
        ></textarea>
      </div>
      <button
        class="btn btn-primary btn-block my-5"
        @click="$emit('try', $event)"
      >
        Simpan
      </button>
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
    addImage() {
      this.$emit("uploadedImage", $event);
    },
    showImg(img) {
      this.imgIconClass = "hidden";
      this.imgClass = "h-56";
      this.imgSrc = URL.createObjectURL(img);
      this.imgName = img.name;
    },
  },
};
</script>