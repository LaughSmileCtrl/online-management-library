<template>
    <div>

        <div class="flex flex-wrap w-full bg-white justify-center">
            <div class="flex flex-wrap justify-center w-2/3 md:w-1/3 h-full pb-10">
                <img src="/images/cover.jpg" class="rounded-lg h-56" />
            </div>
            <div class="w-2/3 px-8 text-left">
                <h3 class="font-bold text-2xl mb-2">
                    {{ book.title }}
                </h3>
                <h5 class="font-bold inline-block">Penulis</h5>
                <h4>{{ book.author }}</h4>
                <h5 class="font-bold inline-block mt-3">Penerbit</h5>
                <h4>{{ book.publisher }}</h4>
                <h5 class="font-bold inline-block mt-3">Tahun Terbit</h5>
                <h4>{{ book.year }}</h4>
                <h5 class="font-bold inline-block mt-3">Jumlah yang dapat dipinjam</h5>
                <h4>{{ book.quantity - book.borrowed_qty }}</h4>
                <h5 class="font-bold inline-block mt-3">Kategori</h5>
                <h4>{{ book.category.name }}</h4>
                <h5 class="font-bold inline-block mt-3">Deskripsi</h5>
                <p class="text-md">
                    {{ book.description }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ['book']
}
</script>
