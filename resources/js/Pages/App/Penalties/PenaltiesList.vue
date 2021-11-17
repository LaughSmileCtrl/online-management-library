<template>
    <AuthLayout>
        <div class="container m-5">
            <PenaltiesTable @admitPenaties="actionAdmit" />
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import PenaltiesTable from "@/Components/PenaltiesTable.vue";

export default {
    components: {
        AuthLayout,
        PenaltiesTable,
    },
    methods: {

        actionAdmit() {
            this.$swal({
                title: "Anda yakin?",
                text:
                    "Apakah anda yakin jika user ini telah membayar denda?",
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
    },
};
</script>
