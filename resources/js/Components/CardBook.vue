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
            <img :src="book.image" class="rounded-lg h-60" style="width: 150px" />
        </figure>
        <div class="max-w-md card-body">
            <h2 class="card-title">
                {{ book.title  }}
            </h2>
            <p class="opacity-50">{{ book.author  }}</p>
            <p class="opacity-50">Tahun Terbit: {{ book.year  }}</p>
            <div v-if="isBorrowed" class="absolute bottom-9 pb-5">
                Kembalikan Sebelum<br />
                <p class="opacity-50">
                    {{ dueAt  }}
                </p>
            </div>
            <p class="opacity-50">ISBN : {{ book.isbn }}</p>
            <div class="btn-group absolute bottom-0 right-0 shadow-2xl">
                <button class="btn btn-sm btn-neutral rounded-none rounded-tl" @click="openDesc">
                    Detail
                </button>
               <button class="btn btn-warning btn-sm rounded-none" @click="returnAction" v-if="isBorrowed">
                    kembalikan
                </button>
                <button class="btn btn-info btn-sm rounded-none" @click="borrowAction" v-if="!isBorrowed && isBookAvailable">
                    pinjam
                </button>
            </div>
        </div>
    </div>
    <BookDescription v-show="false" ref="bookDescription" :book="book" />
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
    data() {
        return {
			isRendered: !this.isAgree,
        };
    },
    props: {
        isAgree: {
            type: Boolean,
            default: true,
        },
		book: {
			type: Object,
			default: {
                id: 0,
				title: 'Xxxx XX Xxx',
				author: 'xxxx',
				year: '0000',
				returnDate: '00/00/0000',

			}
		},
        isBorrowed: {
            type: Boolean,
            default: false,
        },
        dueAt: {
            type: String,
            default: null,
        }
    },
    computed: {
        isBookAvailable() {
            return (this.book.quantity - this.book.borrowed_qty) > 0;
        },
    },
    methods: {
        showAggrement() {
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
        returnAction() {
            this.$swal({
                title: "Anda yakin?",
                text:
                    "Apakah anda benar akan mengembalikan buku ini?",
                icon: "qustion",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Ya, kembalikan",
                cancelButtonText: "Tidak",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(route('book-borrow.destroy', this.book.id), {
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
        borrowAction() {
            this.$swal({
                title: "Anda yakin?",
                text:
                    "Apakah anda benar akan meminjam buku ini?",
                icon: "qustion",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: "Ya, pinjam",
                cancelButtonText: "Tidak",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.post(route('book-borrow.store'), {id: this.book.id}, {
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