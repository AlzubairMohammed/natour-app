<template>
  <div>
    <div class="rent-slide">
      <VueSlickCarousel
        ref="c3"
        :asNavFor="this.$refs.c4"
        :focusOnSelect="true"
      >
        <img
          v-for="thumbnail in thumbnails"
          :key="thumbnail.id"
          :src="thumbnail.src"
        />
      </VueSlickCarousel>
    </div>
    <div class="current-slide">
      <VueSlickCarousel
        ref="c4"
        :asNavFor="this.$refs.c3"
        :slidesToShow="5"
        :autoplay="true"
        :focusOnSelect="true"
      >
        <img
          v-for="thumbnail in thumbnails"
          :key="thumbnail.id"
          :src="thumbnail.src"
        />
      </VueSlickCarousel>
    </div>
  </div>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
export default {
  components: { VueSlickCarousel },
  name: "CarouselRentDetails",
  props: {
    thumbnails: [Array],
  },
  data() {
    return {};
  },
};
</script>

<style>
.rent-slide .slick-prev,
.rent-slide .slick-next {
  width: 28px;
  height: 28px;
  opacity: 1;
  /* background-color: #F7F9FA !important; */
  z-index: 99 !important;
  border-radius: 50% !important;
}
.rent-slide .slick-prev {
  left: 8px !important;
}
.rent-slide .slick-next {
  right: 8px !important;
}
.rent-slide .slick-prev:before,
.rent-slide .slick-next:before {
  opacity: 1 !important;
  color: #fff !important;
}

/* .slick-active.slick-current img{
  height: 100% !important;
} */

.current-slide .slick-active.slick-current img {
  border: 2px solid #3b54ff;
  height: 100% !important;
}
.current-slide .slick-slide {
  margin-top: 8px;
  padding: 0 4px;
}
</style>
