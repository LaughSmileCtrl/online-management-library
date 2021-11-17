<template>
    <AuthLayout>
        <div id="book-table" v-show="onMain">
            <div class="py-5">
                <button class="btn btn-primary my-5" @click="addUser">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Buku
                </button>
            </div>
            <div class="container m-5">
                <ReactiveTable />
            </div>
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
import ReactiveTable from "@/Components/ReactiveTable.vue";
import BookEntry from "@/Components/BookEntry.vue";

export default {
    data() {
        return {
            onMain: true,
        };
    },
    components: {
        AuthLayout,
        ReactiveTable,
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
    },
};
</script>
