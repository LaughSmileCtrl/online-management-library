<template>
    <AuthLayout>
        <div class="z-10 py-5">
            <button class="btn btn-primary my-5" @click="addUser">
                <i class="fa fa-plus"></i>&nbsp; Tambah User
            </button>
        </div>
        <div class="container m-5">
            <UserTable />
        </div>
    </AuthLayout>
    <MemberEntry v-show="false" ref="memberEntry" />
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import UserTable from "@/Components/UserTable.vue";
import MemberEntry from "@/Components/MemberEntry.vue"

export default {
    components: {
        AuthLayout,
        UserTable,
        MemberEntry,
    },
    methods: {
        addUser() {
            this.$swal({
                title: "Tambah Member",
                width: "48rem",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                reverseButtons: true,
                html: this.$refs.memberEntry.$el.innerHTML,
            });
        },
    },
};
</script>
