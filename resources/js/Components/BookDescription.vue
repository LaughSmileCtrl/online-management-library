<template>
    <div>
    
        <div class="flex flex-wrap w-full bg-white justify-center" ref="description">
            <div class="flex flex-wrap w-2/3 md:w-1/3 h-full pb-10">
                <div class="h-auto w-full flex justify-center">
                    <img :src="book.image" class="rounded-lg h-56" />
                </div>
                <div class="flex flex-wrap justify-center w-full my-5">
                    <Link class="btn btn-sm" :href="route('print-book-desc', book.id)">Print</Link>
                </div>
            </div>
            <div class="w-2/3 px-8 text-left">
                <h3 class="font-bold text-2xl mb-2">
                    {{ book.title }}
                </h3>
                <h5 class="font-bold inline-block">ISBN</h5>
                <h4>{{ book.isbn }}</h4>
                <h5 class="font-bold inline-block mt-3">Penulis</h5>
                <h4>{{ book.author }}</h4>
                <h5 class="font-bold inline-block mt-3">Penerbit</h5>
                <h4>{{ book.publisher }}</h4>
                <h5 class="font-bold inline-block mt-3">Tahun Terbit</h5>
                <h4>{{ book.year }}</h4>
                <h5 class="font-bold inline-block mt-3">Jumlah Buku</h5>
                <h4>{{ book.quantity }}</h4>
                <h5 class="font-bold inline-block mt-3">Jumlah yang dapat dipinjam</h5>
                <h4>{{ book.quantity - book.borrowed_qty }}</h4>
                <h5 class="font-bold inline-block mt-3">Kategori</h5>
                <h4>{{ book.category.name }}</h4>
                <h5 class="font-bold inline-block mt-3">Kondisi</h5>
                <h4>{{ book.condition.name }}</h4>
                <h5 class="font-bold inline-block mt-3">Deskripsi</h5>
                <p class="text-md">
                    {{ book.description }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
    data() {
        return {
            temp: '',
        }
    },
    props: ['book'],

}
</script>
