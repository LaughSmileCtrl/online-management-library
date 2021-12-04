<template>
<tr class="hover">
    <th>{{ index }}</th>
    <td>{{ book.isbn }}</td>
    <td>{{ book.title }}</td>
    <td>{{ book.author }}</td>
    <td>{{ book.publisher }}</td>
    <td>{{ book.user.name }}</td>
    <td>{{ book.user.id }}</td>
    <th>
        <div data-tip="deskripsi" class="tooltip">
            <button class="btn btn-acccent btn-sm rounded-none rounded-l" @click="showDesc"><i class="fas fa-info"></i></button>
        </div>
        <div data-tip="ubah" class="tooltip">
            <button class="btn btn-info btn-sm rounded-none" @click="toEdit(book.id)"><i class="fas fa-edit"></i></button>
        </div>
        <div data-tip="terima" class="tooltip" v-if="route().current('donate-book.index')">
            <button class="btn btn-secondary btn-sm rounded-none" @click="toApprovement(book.id)"><i class="fas fa-check"></i></button>
        </div>
        <div data-tip="hapus" class="tooltip">
            <button class="btn btn-error btn-sm rounded-none rounded-r" @click="deleteAction(book.id)"><i class="fa fa-trash"></i></button>
        </div>
    </th>
    <BookDescription v-show="false" ref="bookDesc" :book="book" />
</tr>
</template>

<script>
import BookDescription from "@/Components/BookDescription.vue";

export default {
    props: {
        book: {
            typpe: Object,
            required: true,
        },
        prefix: {
            typpe: String,
            required: true,
        },
    },
    components: {
        BookDescription,
    },
    methods: {
        showDesc() {
            this.$swal({
                title: "Deskripsi Buku",
                width: "52rem",
                showCloseButton: true,
                html: this.$refs.bookDesc.$el.innerHTML,
            });
        },
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
                    this.$inertia.delete(route(this.prefix+'.destroy', id), {
                        onSuccess: page => {
                            this.$swal(page.props.flash.message, '', 'success');
                            this.$inertia.reload({ only: ['books'] });
                        }, 
                        onError: errors => {
                            this.$swal(errors, '', 'error');
                        },
                    });
                }
            });
        },
    }
}
</script>
