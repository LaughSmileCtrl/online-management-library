<template>
    <AuthLayout>
        <div id="book-table" v-show="onMain">
            <div class="py-5">
                <button class="btn btn-primary my-5" @click="changeView">
                    <i class="fa fa-plus"></i>&nbsp; Tambah Pengumuman
                </button>
            </div>
            <div class="container flex flex-wrap gap-2 m-5">
                <AnnouncementCard/>
                <AnnouncementCard/>
                <AnnouncementCard/>
                <AnnouncementCard/>
                <AnnouncementCard/>
            </div>
        </div>
        <div id="add-book" v-show="!onMain">
            <div class="py-5">
                <button class="btn" @click="changeView">
                    <i class="fas fa-arrow-left"></i>&nbsp; Kembali
                </button>
            </div>
            <div class="xl:w-1/2 my-10 bg-white rounded-lg justify-center items-center h-full p-5">
                <AnnouncementEntry ref="bookEntry" />
            </div>
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/Authenticated.vue";
import AnnouncementCard from "@/Components/AnnouncementCard.vue";
import AnnouncementEntry from "@/Components/AnnouncementEntry.vue";

export default {
    data() {
        return {
            onMain: true,
        };
    },
    components: {
        AuthLayout,
        AnnouncementCard,
        AnnouncementEntry,
    },
    methods: {
        changeView() {
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
