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
                <tr v-for="(book, index) of books.data" :key="(book, index)" class="hover" @click="$emit('rowClicked')">
                    <th>{{ index + 1 }}</th>
                    <td>{{ book.isbn }}</td>
                    <td>{{ book.title }}</td>
                    <td>{{ book.author }}</td>
                    <td>{{ book.publisher }}</td>
                    <td>{{ book.category.name }}</td>
                    <td>{{ book.condition.name }}</td>
                    <td>
                        <div data-tip="ubah" class="tooltip">
                            <button class="btn btn-info btn-sm rounded-none rounded-l" @click="$emit('editBook', book.id)"><i class="fas fa-edit"></i></button>
                        </div>
                        <div data-tip="hapus" class="tooltip">
                            <button class="btn btn-error btn-sm rounded-none rounded-r" @click="$emit('deleteBook', book.id)"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
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
    }
}
</script>

