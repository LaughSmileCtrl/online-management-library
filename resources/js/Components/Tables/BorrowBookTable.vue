<template>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>ISBN</th>
                    <th>Judul Buku</th>
                    <th>Nama User</th>
                    <th>ID User</th>
                    <th>Tanggal Pinjam</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(userBook, index) of userBooks" 
                    :key="index"
                >
                    <th>{{ index + 1 }}</th>
                    <td>{{ userBook.book.isbn }}</td>
                    <td>{{ userBook.book.title }}</td>
                    <td>{{ userBook.user.name }}</td>
                    <td>{{ userBook.user.id }}</td>
                    <td>{{ (new Date(userBook.borrow_at)).toLocaleDateString('id-ID') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</template>

<script>

export default {
    components: {
    },
    data() {

    },
    props: {
        userBooks: {
            type: Object,
            required: true,
        }
    },
}
</script>

