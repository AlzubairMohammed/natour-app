<template>

  <div class="banner-img">
    <NavbarHome/>
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-lg-8 text-center m-auto banner-content">
        <h1 class="title">Find Your Favorite Home</h1>
        <div class="card border-0">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-sm-4 mt-2">
                <select v-model="form.city" class="form-select">
                  <option value="">Select your City</option>
                  <option v-for="city in cityList" :key="city.id" :value="city.id">{{city.name}}</option>
                </select>
              </div>
              <div class="col-md-3 col-sm-4 mt-2">
                <select v-model="form.type" class="form-select">
                  <option value="">Rent Type</option>
                  <option v-for="rentType in rentTypeList" :key="rentType" :value="rentType">{{rentType}}</option>
                </select>
              </div>
              <div class="col-md-3 col-sm-4 mt-2">
                <select v-model="form.month" class="form-select py-2">
                  <option value="">Select Month</option>
                  <option v-for="month in monthList" :key="month" :value="month">{{month}}</option>
                </select>
              </div>
              <div class="col-md-3 col-sm-4 mt-2 text-left text-md-center">
                <button class="btn btn-primary px-sm-4 px-md-3 px-lg-4 px-xl-5 px-5" @click="servics">
                  <i class="fa fa-search"></i> Search
                </button>
              </div>
            </div>
            <div v-if="moreOption" class="more-option mt-2">
              <div class="row">
                <div class="col-md-3 col-sm-4">
                  <select v-model="form.badroom" class="form-select">
                  <option value="">Bed Room</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5+</option>
                </select>
                </div>
                <div class="col-md-3 col-sm-4 mt-2">
                  <select v-model="form.washroom" class="form-select">
                  <option value="">Wash Room</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5+</option>
                </select>
                </div>
                <div class="col-md-6 text-left col-sm-4 mt-2">
                  <p class="m-0">Price range <span class="text-primary">{{symbol}}{{form.min ? form.min : 0 }} - {{symbol}}{{form.max ? form.max : '00'}}</span></p>
                  <div class="d-flex">
                    <input type="range" v-model="form.min" min="0" max="100" class="w-50"> <span><i class="fa-solid fa-minus"></i></span>
                    <input type="range" v-model="form.max" min="100" max="20000" class="w-50">
                  </div>
                </div>
              </div>
            </div>
            <div class="text-left text-primary cusor mt-2" @click="toggleMore">
              <span v-if="!moreOption"><img src="/images/plus.png" height="14"> More options</span>
              <span v-else><img src="/images/minus.png" width="16"> Less options</span>
              </div>

          </div>
        </div>
      </div>
    </div>
</div>
<div class="background-slider">
  <VueSlickCarousel v-bind="setting" :arrows="false" :dots="false">
    <img src="/images/Slider-img-1.jpg">
    <img src="/images/Slider-img-2.jpg">
  </VueSlickCarousel>
</div>

  </div>


</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";
import { mapGetters } from 'vuex';
export default {
  components: { VueSlickCarousel },
data() {
  return {
    form:{
      city: '',
      type: '',
      badroom: '',
      washroom: '',
      min: '',
      max: '',
      month: '',
    },

    setting: {
        focusOnSelect: true,
        infinite: true,
        speed: 500,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    moreOption: false,
    rentTypeList: '',
    cityList: '',
    monthList:[
      'January','February','March','April','May','June','July','August','September','October','November','December'
    ],
  }
},
computed: mapGetters({
     symbol: "currency/getSymbol",
  }),
 mounted() {
  this.getRentType();
  this.getCity();
},
methods: {
  getRentType(){
    this.$store.dispatch("rent/rentType").then(res=>{
      this.rentTypeList = res.data.type
    })
  },
  getCity(){
    this.$store.dispatch("rent/getCity").then( res => {
      this.cityList = res.data.cities
    })
  },
  servics(){
    this.$store.commit('filter/SET_DATA', this.form)
    this.$router.push('/service')
  },
  toggleMore(){
    this.moreOption = !this.moreOption
  }
},
}
</script>

<style  scoped>
.banner-img{
  width: 100%;
  height: 100vh;
  position: relative;
}
.background-slider,.slick-slider{
  position: absolute;
  width: 100%;
  height: 100vh;
  top: 0;
  left: 0;
  z-index: -1;
}
.slick-slider img{
  width: 100%;
  height: 100vh !important;
  object-fit: cover;
}
.banner-content{
  z-index: 1;
}
.title{
  font-size: 48px;
  color: #fff;
  font-weight: bold;
  margin-bottom: 28px;
  padding-top: 125px;
}
.form-select,.form-control{
  background-color: #F7F9FA !important;
  border-color: #F7F9FA !important;
}
.cusor{
  cursor: pointer;
}
@media screen and (max-width: 1024px) {
  .title{
    padding-top: 70px;
    margin-bottom: 16px;
  }
}
@media screen and (max-width: 578px) {
  .title{
    font-size: 24px;
    padding-top: 40px;
    margin-bottom: 16px;
  }
}
</style>
