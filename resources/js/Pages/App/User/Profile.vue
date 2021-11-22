<template>
    <AuthLayout>
        <!-- Add Here -->
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import UserTable from "@/Components/Tables/UserTable.vue";
import MemberEntry from "@/Components/Forms/MemberEntry.vue"

export default {
    components: {
        AuthLayout,
        UserTable,
        MemberEntry,
    },
};
</script>
