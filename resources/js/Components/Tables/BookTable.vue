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
                <tr v-for="(book, index) of books" :key="(book, index)" class="hover">
                    <th>{{ index + 1 }}</th>
                    <td>{{ book.isbn }}</td>
                    <td>{{ book.title }}</td>
                    <td>{{ book.author }}</td>
                    <td>{{ book.publisher }}</td>
                    <td>{{ book.category.name }}</td>
                    <td>{{ book.condition.name }}</td>
                    <th>
                        <div data-tip="ubah" class="tooltip">
                            <button class="btn btn-info btn-sm rounded-none rounded-l" @click="toEdit(book.id)"><i class="fas fa-edit"></i></button>
                        </div>
                        <div data-tip="terima" class="tooltip" v-if="route().current('donate-book.index')">
                            <button class="btn btn-secondary btn-sm rounded-none" @click="toApprovement(book.id)"><i class="fas fa-check"></i></button>
                        </div>
                        <div data-tip="hapus" class="tooltip">
                            <button class="btn btn-error btn-sm rounded-none rounded-r" @click="deleteAction(book.id)"><i class="fa fa-trash"></i></button>
                        </div>
                    </th>
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
    methods: {
        toEdit(id) {
            this.$inertia.get(route( this.prefix+'.edit', id))
        },
        toApprovement(id) {
            this.$swal({
                title: 'Anda yakin?',
                text:
                    'Apakah anda benar akan menambah buku ini?',
                icon: 'qustion',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya, tambah',
                cancelButtonText: 'Tidak',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.post(route('donate-book.approve', id), null, {
                        onSuccess: page => {
                            this.$swal(page.props.flash.message, '', 'success');
                            this.$inertia.reload({ only: ['books'] });
                        },
                    });
                }
            });
        },
        deleteAction(id) {
            this.$swal({
                title: 'Anda yakin?',
                text:
                    'Apakah anda benar akan menghapus buku ini?',
                icon: 'qustion',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Tidak',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(route( this.prefix+'.destroy', id), {
                        onSuccess: page => {
                            this.$swal(page.props.flash.message, '', 'success');
                            this.$inertia.reload({ only: ['books'] });
                        }, 
                        onError: errors => {
                            this.$swal('gagal ', '', 'error');
                        },
                    });
                }
            });
        },
    }
}
</script>

