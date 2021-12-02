<template>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>ISBN</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Kategory</th>
                    <th>Kondisi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <RowBookTable 
                    v-for="(book, index) of books" 
                    :key="(book, index)" 
                    :book="book"
                    :index="index+1" 
                    :prefix="prefix" />
            </tbody>
        </table>
    </div>

</template>

<script>

import RowBookTable from "@/Components/Tables/RowBookTable.vue";

export default {
    components: {
        RowBookTable,
    },
    data() {

    },
    props: {
        books: {
            type: Object,
            default : [
                {
                    isbn: 'xxxxx',
                    title: 'xxxxx',
                    author: 'xxxxx',
                    category: 'xxxxx',
                    condition: 'xxxxx',
                }
            ]
        }
    },
    computed : {
        prefix() {
            return (route().current('book.*')) 
                ? 'book'
                : 'donate-book';
        }
    },
    
}
</script>

