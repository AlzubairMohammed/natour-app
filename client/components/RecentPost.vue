<template>
  <div class="recent bg-color py-5">
    <div class="container">
      <h1 class="recent-title text-center">Recent Posts</h1>
      <p class="short-desc text-center">
        Lorem ipsum is a placeholder text commonly used to demonstrate the
        visual form of a document.
      </p>
      <div v-if="recentPosts" class="post-section mt-4 pb-3">
        <VueSlickCarousel v-bind="setting">
          <div v-for="recentpost in recentPosts" :key="recentpost.id" class="post">
            <nuxt-link :to="'/service/'+ recentpost.id">
            <div class="card border-0">
              <div class="card-top">
              <img :src="recentpost.thumbnails != '' ? 'http://admin.natour.ae' + recentpost.thumbnails[0].src : ''" width="100%" />
              <div class="overItem">
                <i class="fa-solid fa-image font-16"></i>
                <span class="font-18"> {{recentpost.thumbnails.length > 1 ? recentpost.thumbnails.length - 1 : '0'}}</span>
              </div>
              </div>
              <div class="card-body">
                <p class="text-green m-0 font-18 font-weight-bold">
                 {{ symbol }}{{recentpost.charges.rent_price}}/Month
                </p>
                <p class="m-0 font-18 desc">
                 {{recentpost.title}}
                </p>
                <div class="border"></div>
                <div class="row">
                  <div class="col-6">
                    <p class="font-14">Rent Type</p>
                    <p class="font-14 text-gray">{{recentpost.type}}</p>
                  </div>
                  <div class="col-6">
                    <p class="font-14">Rent From</p>
                    <p class="font-14 text-gray">{{recentpost.rent_info.available_from}}</p>
                  </div>
                </div>
              </div>
            </div>
            </nuxt-link>
          </div>

        </VueSlickCarousel>
      </div>
    </div>
  </div>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel.css";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
import { mapGetters } from 'vuex';

export default {
  components: { VueSlickCarousel },
  data() {
    return {
      setting: {
        dots: true,
        arrow: true,
        focusOnSelect: true,
        infinite: false,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        touchThreshold: 5,
        responsive: [
          {
            breakpoint: 785,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 572,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            },
          },
        ],
      },

      allRents: '',
      recentPosts: "",

      filter:{
        short_by: 1,
      }

    };
  },

  computed: mapGetters({
     symbol: "currency/getSymbol",
  }),

  mounted() {
    this.GetAllRents();
  },

  methods: {

    GetAllRents(){
      const filter = 'short_by='+this.filter.short_by
      this.$store.dispatch("rent/getAllRents",filter).then(res => {
        this.allRents = res.data.rents
        this.sliceItemsForList()
      })
    },

    sliceItemsForList() {
      this.recentPosts = this.allRents.slice(0,10);
    },

  }


};
</script>

<style scoped>
a{
  text-decoration: none;
  color: #000;
}
.card-top{
  position: relative;
}
.overItem{
  position: absolute;
  bottom: 8px;
  left: 14px;
  background: #FFFFFF;
  padding: 0 6px;
  border-radius: 2px;
}
.overItem span{
  line-height: 12px;
}
.post{
  padding: 6px 12px !important;
}
.recent-title {
  font-size: 36px;
  color: #000;
  font-weight: bold;
}
.short-desc {
  color: #808080;
  font-size: 18px;
  line-height: 26px;
  font-weight: normal;
  margin-top: 8px;
}
.desc {
  line-height: 26px;
}
.border {
  border-top: 1px solid #ddd !important;
  margin: 12px 0;
}
.slick-prev:before, .slick-next:before {
  opacity: 0.75;
  color: #6c757d !important;
}
</style>
