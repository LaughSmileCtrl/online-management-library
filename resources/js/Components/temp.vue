<template>
    <div class="flex flex-wrap w-full bg-white justify-center">
        <div class="flex flex-wrap justify-center w-2/3 md:w-1/3 h-full pb-10">
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
            <div class="form-control w-auto items-center mt-3">
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
                        @change="$emit('uploadedImage', $event)"
                    />
                </label>
                <p>{{ imgName }}</p>
            </div>
        </div>
        <div class="w-2/3 px-8 text-left">
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