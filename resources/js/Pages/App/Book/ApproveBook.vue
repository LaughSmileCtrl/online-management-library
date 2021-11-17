<template>
    <AuthLayout>
        <div class="container m-5">
            <BookDonateTable @admitBook="actionAdmit" @deleteBook="actionDelete" />
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import BookDonateTable from "@/Components/BookDonateTable.vue";

export default {
    components: {
        AuthLayout,
        BookDonateTable,
    },
    methods: {

        actionAdmit() {
            this.$swal({
                title: "Anda yakin?",
                text:
                    "Apakah anda yakin untuk menambah buku ini?",
                icon: "qustion",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Ya, yakin",
                cancelButtonText: "Tidak",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$swal("Tersimpan", "", "success");
                }
            });
        },
        actionDelete() {
             this.$swal({
                title: "Anda yakin?",
                text:
                    "Apakah anda yakin untuk menghapus donasi buku ini?",
                icon: "qustion",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Ya, yakin",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$swal("Tersimpan", "", "success");
                }
            });
        },
    },
};
</script>
