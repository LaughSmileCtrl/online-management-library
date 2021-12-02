
<template>
    <Swiper
        :pagination="{
            clickable: true,
        }"
        :breakpoints="breakpoints"
        :grabCursor="true"
    >
        <SwiperSlide v-for="(bookBorrow, index) of booksBorrow" 
			:key="index">
			<div class="mb-11">
				<CardBook 
					:book="bookBorrow.book" 
					:dueAt="bookBorrow.due_at"
					isBorrowed="true"
				/>
			</div>
		</SwiperSlide>
    </Swiper>
</template>
<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import SwiperCore, { Pagination } from "swiper";

import "swiper/css";
import "swiper/css/pagination";

import CardBook from "@/Components/CardBook.vue";

SwiperCore.use([Pagination]);

export default {
    components: {
        Swiper,
        SwiperSlide,
        CardBook,
    },
    data() {
        return {
            breakpoints: {
                1536: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                1280: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 5,
                },
            },
        };
    },
    props: ['booksBorrow'],
};
</script>