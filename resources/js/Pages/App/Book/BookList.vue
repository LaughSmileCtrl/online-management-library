<template>
    <AuthLayout>
        <div id="book-table" v-show="onMain" class="mb-10">
            <div class="py-5">
                <button class="btn btn-primary my-5" @click="addUser">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Buku
                </button>
            </div>
            <BookTable
                @editBook="actionEdit"
                @deleteBook="actionDelete"
            />
        </div>
        <div id="add-book" v-show="!onMain">
            <div class="py-5">
                <button class="btn" @click="addUser">
                    <i class="fas fa-arrow-left"></i>&nbsp; Kembali
                </button>
            </div>
            <BookEntry ref="bookEntry" @uploadedImage="previewFile" />
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import BookTable from "@/Components/Tables/BookTable.vue";
import BookEntry from "@/Components/Forms/BookEntry.vue";

export default {
    data() {
        return {
            onMain: true,
        };
    },
    components: {
        AuthLayout,
        BookTable,
        BookEntry,
    },
    methods: {
        addUser() {
            this.onMain = !this.onMain;
        },
        previewFile(event) {
            var img = event.target.files[0];
            this.$refs.bookEntry.showImg(img);
        },
        actionEdit() {
            this.onMain = !this.onMain;
        },
        actionDelete() {
            this.$swal({
                title: "Anda yakin?",
                text:
                    "Apakah anda benar akan mwnghapus buku ini?",
                icon: "qustion",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Tidak",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$swal("Tersimpan", "", "success");
                }
            });
        },
    },
};
</script>
