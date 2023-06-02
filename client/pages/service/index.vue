<template>
  <div class="bg-color">
    <div class="container">
      <div class="search-section py-3">
        <div class="card card-body border-0">
          <div class="row">
            <div class="col-md-4">
              <select v-model="city" class="form-select search py-2">
                <option value="">Select your City</option>
                <option v-for="city in cityList" :key="city.id" :value="city.id">{{city.name}}</option>
              </select>
            </div>
            <div class="col-md-4">
              <select v-model="type" class="form-select search py-2">
                <option value="">Rent Type</option>
                <option v-for="rentType in rentTypeList" :key="rentType" :value="rentType">{{rentType}}</option>
              </select>
            </div>
            <div class="col-md-4 text-md-center">
              <button class="btn btn-primary py-2 w-100" @click="searchCityType">
                <i class="fa fa-search"></i> Search
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="content pb-3">
        <div class="row">
          <!-- left side -->
          <div class="col-md-4">
            <div class="card card-body border-0 rounded-0">
              <p class="font-20 bold">Sort by</p>
              <select v-model="filters.short_by" class="form-select py-2">
                <option value="">All Ads</option>
                <option value="1">New Ads</option>
              </select>
              <!-- Type of Tenant -->
              <div class="tenant-section">
                <p class="font-20 my-1 bold">Type of Tenant</p>
                <p>
                  <input type="checkbox" value="Family" id="Family" true-value="1" false-value=""/>
                  <label for="Family" class="font-16 ms-1">Family</label>
                </p>
                <p>
                  <input type="checkbox" value="Bachelor" id="Bachelor" true-value="1" false-value=""/>
                  <label for="Bachelor" class="font-16 ms-1">Bachelor</label>
                </p>
                <p>
                  <input
                    v-model="filters.male_student"
                    type="checkbox"
                    id="Male_Student"
                    true-value="1" false-value=""
                  />
                  <label for="Male_Student" class="font-16 ms-1"
                    >Male Student</label
                  >
                </p>
                <p>
                  <input
                    v-model="filters.female_student"
                    type="checkbox"
                    value="1"
                    id="Female_Student"
                    true-value="1" false-value=""
                  />
                  <label for="Female_Student" class="font-16 ms-1"
                    >Female Student</label
                  >
                </p>
                <p>
                  <input
                    type="checkbox"
                    value="Small Family"
                    id="Small Family"
                    true-value="1" false-value=""
                  />
                  <label for="Small Family" class="font-16 ms-1"
                    >Small Family</label
                  >
                </p>
                <p>
                  <input
                    v-model="filters.women_job"
                    type="checkbox"
                    value="1"
                    id="Female_Job_Holder"
                    true-value="1" false-value=""
                  />
                  <label for="Female_Job_Holder" class="font-16 ms-1"
                    >Female Job Holder</label
                  >
                </p>
                <p>
                  <input
                    v-model="filters.man_job"
                    type="checkbox"
                    value="1"
                    id="Male_Job_Holder"
                    true-value="1" false-value=""
                  />
                  <label for="Male_Job_Holder" class="font-16 ms-1"
                    >Male Job Holder</label
                  >
                </p>
              </div>

              <!-- Bed Room -->
              <div class="bed-room-section">
                <p class="font-20 mb-2 bold">Bed Room</p>
                <input
                  type="radio"
                  class="btn-check"
                  v-model="filters.badroom"
                  id="option1"
                  value="1"
                  autocomplete="off"
                />
                <label class="custom-btn" for="option1">1</label>

                <input
                  type="radio"
                  class="btn-check"
                  v-model="filters.badroom"
                  id="option2"
                  value="2"
                  autocomplete="off"
                />
                <label class="custom-btn" for="option2">2</label>

                <input
                  type="radio"
                  class="btn-check"
                  v-model="filters.badroom"
                  id="option3"
                  value="3"
                  autocomplete="off"
                />
                <label class="custom-btn" for="option3">3</label>

                <input
                  type="radio"
                  class="btn-check"
                  v-model="filters.badroom"
                  id="option4"
                  value="4"
                  autocomplete="off"
                />
                <label class="custom-btn" for="option4">4</label>

                <input
                  type="radio"
                  class="btn-check"
                  v-model="filters.badroom"
                  id="option5"
                  value="5"
                  autocomplete="off"
                />
                <label class="custom-btn" for="option5">5+</label>
              </div>

              <!-- Wash Room -->
              <div class="wash-room-section">
                <p class="font-20 mb-2 bold">Wash Room</p>
                <input
                  type="radio"
                  class="btn-check"
                  v-model="filters.washroom"
                  id="washroom1"
                  autocomplete="off"
                  value="1"
                />
                <label class="custom-btn" for="washroom1">1</label>

                <input
                  type="radio"
                  class="btn-check"
                  v-model="filters.washroom"
                  id="washroom2"
                  autocomplete="off"
                  value="2"
                />
                <label class="custom-btn" for="washroom2">2</label>

                <input
                  type="radio"
                  class="btn-check"
                  v-model="filters.washroom"
                  id="washroom3"
                  value="3"
                  autocomplete="off"
                />
                <label class="custom-btn" for="washroom3">3</label>

                <input
                  type="radio"
                  class="btn-check"
                  v-model="filters.washroom"
                  id="washroom4"
                  value="4"
                  autocomplete="off"
                />
                <label class="custom-btn" for="washroom4">4</label>

                <input
                  type="radio"
                  class="btn-check"
                  v-model="filters.washroom"
                  id="washroom5"
                  value="5"
                  autocomplete="off"
                />
                <label class="custom-btn" for="washroom5">5+</label>
              </div>
              <!-- From -->
              <div class="form-section">
                <p class="font-20 mt-1 bold">From</p>
                <select v-model="filters.month" class="form-select py-2">
                  <option value="" selected>Select Month</option>
                  <option v-for="month in monthList" :key="month" :value="month">{{month}}</option>
                </select>
              </div>

              <!-- Rent Amount -->
              <div class="Rent-Amount-section">
                <p class="font-20 mt-2 bold">Rent Amount</p>
                <div class="row">
                  <div class="col-6">
                    <label class="m-0">Min</label>
                    <input v-model="minAmount" type="number" class="form-control py-2" placeholder="Min Amount">
                  </div>
                  <div class="col-6">
                    <label class="m-0">Max</label>
                    <input v-model="maxAmount" type="number" class="form-control py-2" placeholder="Max Amount">
                  </div>
                </div>
                <button v-if="minAmount || maxAmount" class="btn btn-primary w-100 mt-2" @click="searchMaxMin"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
              </div>
            </div>
          </div>

          <!-- right side -->
          <div class="col-md-8">

            <div class="card card-body rounded-0 border-0">

              <div class="services" id="AllRentLists">

                <div class="services-item" v-for="rent in paginateItems" :key="rent.id">
                  <nuxt-link :to="'/service/'+ rent.id">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="box-image">
                          <img :src="rent.thumbnails != '' ? rent.thumbnails[0].src : ''" />
                          <div class="overItem">
                            <i class="fa-solid fa-image font-16"></i>
                            <span class="font-18"> {{rent.thumbnails[0] ? rent.thumbnails.length - 1 : '0'}}</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8 ps-md-2">
                        <div class="like">
                          <p class="text-green m-0 font-18 bold">
                            {{ symbol }}{{rent.charges.rent_price}}/Month
                          </p>
                        </div>
                        <p class="m-0 font-16 desc mt-lg-2">
                          {{rent.title}}
                        </p>

                        <div class="row rent mt-lg-3 mt-2">
                          <div class="col-5 col-sm-4">
                            <p class="font-14">Rent Type</p>
                            <p class="font-14 text-gray">{{rent.type}}</p>
                          </div>
                          <div class="col-7 col-sm-8">
                            <p class="font-14">Rent From</p>
                            <p class="font-14 text-gray">{{rent.rent_info.available_from}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </nuxt-link>

                  <div v-if="isLogging && doMatch(rent.id) == 1" class="favorite-icon" @click="removeFavorite(rent.id)">
                    <span class="heard-like">
                      <i class="fa-solid fa-heart"></i>
                    </span>
                  </div>

                  <div v-else class="favorite-icon" @click="addFavorite(rent.id)">
                    <span class="heard">
                      <!-- <i class="fa-solid fa-heart"></i> -->
                      <i class="fa-regular fa-heart"></i>
                    </span>
                  </div>
                </div>

                <div v-if="paginateItems ==''" class="mt-4">
                  <div class="emply-message text-center">
                      <h3>Oops!</h3>
                      <p>Rents list is empty</p>
                  </div>
                </div>

              </div>

            </div>

            <!-- custom pagination -->

            <div class="mt-3 d-flex justify-content-end flex-wrap">
              <b-pagination
                v-model="currentPage"
                :total-rows="rows"
                :per-page="perPage"
                aria-controls="AllRentLists"
              ></b-pagination>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  layout: "default",

  data() {
    return {
      allRents: [],
      rentTypeList: '',
      cityList: '',
      currentPage: 1,
      perPage: 10,
      rows: '',
      paginateItems: '',

      filters:{
        short_by: '',
        month: '',
        city: '',
        rent_type: '',
        male_student:'',
        female_student: '',
        man_job: '',
        women_job: '',
        badroom: '',
        washroom: '',
        min: '',
        max: '',
      },

      city: '',
      type: '',

      monthList:[
        'January','February','March','April','May','June','July','August','September','October','November','December'
      ],
      favoriteList: {},
      minAmount: '',
      maxAmount: '',
    };
  },
  watch:{
    currentPage(){
      this.sliceItemsForList()
    },
    'filters': {
      handler: function (after, before) {
        this.GetAllRents()
      },
      deep: true
    }
  },
  computed: mapGetters({
    symbol: "currency/getSymbol",
    isLogging: 'auth/isLoggedIn',
    showLoader: 'loader/getLoader',
    filtersData: 'filter/filters',
  }),
  mounted() {
    this.GetAllRents();
    this.getRentType();
    this.getCity();
    this.getFavoriteList();
    this.filtersDataSet();
  },

  methods: {
    searchMaxMin(){
      this.filters.min = this.minAmount
      this.filters.max = this.maxAmount
    },
    searchCityType(){
      this.filters.city = this.city
      this.filters.rent_type = this.type
    },

    doMatch(id){
      if (!this.favoriteList) {
        return false
      }

      for (let i = 0; i < this.favoriteList.length; i++) {
        if (this.favoriteList[i].rent.id === id) {
          return true
        }
      }
    },

    addFavorite(id){
      if (!this.isLogging) {
        this.$toast.error('Please Login first')
        this.$router.push('/login-signup')
      }
      this.$store.dispatch('favorite/addFavorites','rent_id='+id).then(res=>{
        this.$toast.success(res.message)
        this.getFavoriteList()
      })
    },

    removeFavorite(id){
      for (let i = 0; i < this.favoriteList.length; i++) {
        if (this.favoriteList[i].rent.id === id) {
          this.$store.dispatch('favorite/removeFavorite',this.favoriteList[i].id).then(res=>{
            this.$toast.success(res.message)
            this.favoriteList.splice(i,1)
          })
          return true
        }
      }
    },

    getFavoriteList(){
      this.$store.dispatch('favorite/favoriteList')
      .then(res=> {
        this.favoriteList = res.data.favorites
      })
    },

    GetAllRents(){
      const MaleStudent = this.filters.male_student ? '1' : '';
      const FemalStudent = this.filters.female_student ? '1' : '';
      const MaleJob = this.filters.man_job ? '1' : '';
      const FemalJob = this.filters.women_job ? '1' : '';

      const filter = "short_by="+this.filters.short_by+"&month="+this.filters.month+"&city="+this.filters.city+"&rent_type="+this.filters.rent_type+"&badroom="+this.filters.badroom+"&washroom="+this.filters.washroom+"&min="+this.filters.min+"&max="+this.filters.max+"&male_student="+MaleStudent+"&female_student="+FemalStudent+"&man_job="+MaleJob+"&women_job="+FemalJob;

      this.$store.commit("loader/SET_Loader",true)
      this.$store.dispatch("rent/getAllRents",filter).then(res => {
        this.allRents = res.data.rents
        this.rows = this.allRents.length;
        this.sliceItemsForList()
        this.$store.commit("loader/SET_Loader",false)
      }).catch(err=>{
        this.$store.commit("loader/SET_Loader",false)
        console.log(err);
      })
    },

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

    sliceItemsForList() {
      this.paginateItems = this.allRents.slice(
        (this.currentPage - 1) * this.perPage,
        this.currentPage * this.perPage,
      );
      window.scrollTo({ top: 0, behavior: 'smooth' });
    },

    filtersDataSet(){
     if (this.filtersData) {
      this.filters.city =  this.filtersData.city
      this.city = this.filtersData.city
      this.filters.rent_type = this.filtersData.type
      this.type = this.filtersData.type
      this.filters.badroom = this.filtersData.badroom
      this.filters.washroom = this.filtersData.washroom
      this.filters.min = this.filtersData.min
      this.filters.max = this.filtersData.max
      this.minAmount = this.filtersData.min
      this.maxAmount = this.filtersData.max
      this.filters.month = this.filtersData.month
      this.$store.commit('filter/SET_DATA', '')
     }
    },

  },
};
</script>

<style scoped>
.heard {
  color: #00a0a560;
  font-size: 21px;
}
.heard-like {
  color: #dc3545;
  font-size: 21px;
}
a {
  text-decoration: none;
  color: black;
}
.services-item {
  padding: 12px 0;
  border-bottom: 1px solid #ddd;
  position: relative;
}
.favorite-icon {
  position: absolute;
  top: 12px;
  right: 0px;
  width: 30px;
  height: 30px;
  display: flex;
  justify-content: center;
  border-radius: 50%;
  cursor: pointer;
}
.box-image {
  position: relative;
  height: 120px;
}
.box-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.overItem {
  position: absolute;
  bottom: 4px;
  left: 8px;
  background: #ffffff;
  padding: 0 6px;
  border-radius: 2px;
}
.overItem span {
  line-height: 12px;
}
.desc {
  line-height: 20px;
}
.border {
  border-top: 1px solid #ddd !important;
  margin: 12px 0;
}

.search {
  background-color: #f7f9fa;
  border-color: #f7f9fa;
}
.custom-btn {
  width: 30px;
  height: 30px;
  background: #f0f4f8;
  color: #000;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  font-size: 12px;
  cursor: pointer;
}
.btn-check:checked + .custom-btn {
  background: linear-gradient(122deg, #3b99fe 0%, #3b54ff 100%);
  color: #fff;
}
</style>
