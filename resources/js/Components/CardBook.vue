<template>
    <div
        class="
            card
            md:card-side
            compact
            flex-shrink
            shadow
            border-gray-500
            m-3
            w-46
            md:w-96
            h-60
            bg-white
            shadow
        "
    >
        <figure class="hidden md:block">
            <img src="@/Img/cover.jpg" class="rounded-lg h-60" />
        </figure>
        <div class="max-w-md card-body">
            <h2 class="card-title">
                {{ book.title  }}
            </h2>
            <p class="opacity-50">{{ book.author  }}</p>
            <p class="opacity-50">Tahun Terbit: {{ book.year  }}</p>
            <div v-if="type == 1" class="absolute bottom-9 pb-5">
                Kembalikan Sebelum<br />
                <p class="opacity-50">
                    {{ book.returnDate  }}
                </p>
            </div>
            <div class="btn-group absolute bottom-0 right-0 shadow-2xl">
                <button class="btn btn-sm btn-neutral rounded-none rounded-tl" @click="openDesc">
                    Detail
                </button>
                <button :class="btnClassify" @click="showModal">
                    {{ btnText }}
                </button>
            </div>
        </div>
    </div>
    <BookDescription v-show="false" ref="bookDescription" />
	<Agreement v-show="false" v-if="isRendered" ref="modal" />
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import BookDescription from "@/Components/BookDescription.vue";
import Agreement from "@/Components/Agreement.vue";

export default {
    components: {
        Link,
        BookDescription,
		Agreement,
    },
    emits: ["agreement"],
    data() {
        return {
            cardTypes: [
                {
                    type: "borrow",
                    text: "pinjam",
                    btnClass: "info",
                },
                {
                    type: "return",
                    text: "kembalikan",
                    btnClass: "warning",
                },
            ],
			isRendered: !this.isAgree,
        };
    },
    props: {
        type: Number,
        isAgree: {
            type: Boolean,
            default: true,
        },
		book: {
			type: Object,
			default: {
				title: 'Xxxx XX Xxx',
				author: 'xxxx',
				year: '0000',
				returnDate: '00/00/0000',

			}
		},
    },
    computed: {
        btnText() {
            return this.cardTypes[this.type].text;
        },
        btnClassify() {
            return "btn btn-" + this.cardTypes[this.type].btnClass + " btn-sm rounded-none rounded-br";
        },
    },
    methods: {
        showModal() {
            if (this.type == 0 && !this.isAgree) {
                this.$swal({
                    title: "Persetujuan",
                    width: "52rem",
                    showCloseButton: true,
                    html: this.$refs.modal.$el.innerHTML,
                });
            } else {
                this.openAlert();
            }
        },
        openAlert() {
            this.$swal({
                title: "Anda yakin?",
                text:
                    "Apakah anda benar akan " +
                    this.cardTypes[this.type].text +
                    " buku ini?",
                icon: "qustion",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Ya, " + this.cardTypes[this.type].text,
                cancelButtonText: "Tidak",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$swal("Tersimpan", "", "success");
                }
            });
        },
        openDesc() {
            this.$swal({
                title: "Deskripsi Buku",
                width: "52rem",
                showCloseButton: true,
                html: this.$refs.bookDescription.$el.innerHTML,
            });
        },
    },
};
</script>