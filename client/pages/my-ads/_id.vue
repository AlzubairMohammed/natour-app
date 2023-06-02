<template>
    <div class="content bg-color py-3">
        <div class="container">
            <div class="card card-body border-0">
                <h3 class="font-24 bold">Edit A Post</h3>

                  <ul class="nav mb-4">
                      <li class="nav-item active">Step 1</li>
                      <li class="nav-item" :class="StepTwoShow || StepThreeShow ? 'active' : ''">Step 2</li>
                      <li class="nav-item" :class="StepThreeShow ? 'active' : ''">Step 3</li>
                  </ul>

              <form>
                  <div v-if="StepOneShow" class="step1">
                    <div class="mb-3">
                      <label class="font-20 bold mb-0">Title <span class="text-danger">*</span></label>
                     <input type="text" v-model="form.title" placeholder="Enter Title" class="form-control bg-color" :class="{'is-invalid' : stepErrors.title}">
                     <small v-if="stepErrors.title" class="text-danger">{{stepErrors.title}}</small>
                    </div>

                      <h3 class="font-20 bold">Rent Type <span class="text-danger">*</span></h3>
                      <div class="section">
                          <div class="item">
                              <input v-model="form.type" type="radio" class="btn-check" value="Seat Rent" id="Seat-Rent" autocomplete="off">
                              <label class="box" for="Seat-Rent">
                                  <img src="/images/Post-Ad-Step-1/seat rent.svg">
                                  <p class="box-text">Seat Rent</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>

                          <div class="item">
                              <input v-model="form.type" type="radio" class="btn-check" value="Sublet Rent" id="Sublet-Rent" autocomplete="off">
                              <label class="box" for="Sublet-Rent">
                                  <img src="/images/Post-Ad-Step-1/Sublet Rent.svg">
                                  <p class="box-text">Sublet Rent</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>

                          <div class="item">
                              <input v-model="form.type" type="radio" class="btn-check" value="Flat Rent" id="Flat-Rent" autocomplete="off">
                              <label class="box" for="Flat-Rent">
                                  <img src="/images/Post-Ad-Step-1/Flat Rent.svg">
                                  <p class="box-text">Flat Rent</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>
                      </div>
                      <small v-if="stepErrors.type" class="text-danger">{{stepErrors.type}}</small>

                      <h3 class="font-20 bold mt-3">Who do you want to rent to?</h3>
                      <div class="section">
                          <div class="item">
                              <input type="checkbox" v-model="form.male_student" class="btn-check" true-value="1" false-value="0" id="Male-Student" autocomplete="off">
                              <label class="box" for="Male-Student">
                                  <img src="/images/Post-Ad-Step-1/Male Student.svg">
                                  <p class="box-text">Male Student</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>

                          <div class="item">
                              <input type="checkbox" v-model="form.female_student" true-value="1" false-value="0" class="btn-check" id="Female-Student" autocomplete="off">
                              <label class="box" for="Female-Student">
                                  <img src="/images/Post-Ad-Step-1/Female Student.svg">
                                  <p class="box-text">Female Student</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>

                          <div class="item">
                              <input type="checkbox" v-model="form.man_job" true-value="1" false-value="0" class="btn-check" id="Man-Job-Holder" autocomplete="off">
                              <label class="box" for="Man-Job-Holder">
                                  <img src="/images/Post-Ad-Step-1/Man Job Holder.svg">
                                  <p class="box-text">Man Job Holder</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>

                          <div class="item">
                              <input type="checkbox" v-model="form.women_job" true-value="1" false-value="0" class="btn-check" id="Women-Job-Holder" autocomplete="off">
                              <label class="box" for="Women-Job-Holder">
                                  <img src="/images/Post-Ad-Step-1/Women Job Holder.svg">
                                  <p class="box-text">Women Job Holder</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>

                          <div class="item">
                              <input type="checkbox" v-model="form.any" true-value="1" false-value="0" class="btn-check" id="Any" autocomplete="off">
                              <label class="box" for="Any">
                                  <img src="/images/Post-Ad-Step-1/any.svg">
                                  <p class="box-text">Any</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>
                      </div>

                      <h3 class="font-20 bold mt-3">Which religion do you want to rent a house to?</h3>
                      <div class="section">
                          <div class="item">
                              <input type="checkbox" v-model="form.islam" true-value="1" false-value="0" class="btn-check" id="Islam" autocomplete="off">
                              <label class="box" for="Islam">
                                  <img src="/images/Post-Ad-Step-1/muslim.svg">
                                  <p class="box-text">Islam</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>

                          <div class="item">
                              <input type="checkbox" v-model="form.hindu" true-value="1" false-value="0" class="btn-check" id="Hindu" autocomplete="off">
                              <label class="box" for="Hindu">
                                  <img src="/images/Post-Ad-Step-1/hindu.svg">
                                  <p class="box-text">Hindu</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>

                          <div class="item">
                              <input type="checkbox" v-model="form.christian" true-value="1" false-value="0" class="btn-check" id="Christian" autocomplete="off">
                              <label class="box" for="Christian">
                                  <img src="/images/Post-Ad-Step-1/Christian.svg">
                                  <p class="box-text">Christian</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>

                          <div class="item">
                              <input type="checkbox" v-model="form.bouddho" true-value="1" false-value="0" class="btn-check" id="Bouddho" autocomplete="off">
                              <label class="box" for="Bouddho">
                                  <img src="/images/Post-Ad-Step-1/buddha.svg">
                                  <p class="box-text">Bouddho</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>

                          <div class="item">
                              <input type="checkbox" v-model="form.any_religion" true-value="1" false-value="0" class="btn-check" id="Any-region" autocomplete="off">
                              <label class="box" for="Any-region">
                                  <img src="/images/Post-Ad-Step-1/any.svg">
                                  <p class="box-text">Any</p>
                                  <i class="fa fa-circle-check checkIcon"></i>
                              </label>
                          </div>
                      </div>

                      <div class="d-flex justify-content-end my-3">
                          <button class="btn btn-primary px-4" type="button" @click.prevent="stepTwo()">
                              Next <img src="/images/icon/right-arrow.png" width="18">
                          </button>
                      </div>

                  </div>

                  <!-- step2 -->
                  <div v-if="StepTwoShow" class="step2">
                      <h3 class="font-20 bold">Home details</h3>
                      <div class="row">
                          <div class="col-md-4 col-lg-3 col-sm-6 mb-2">
                              <label class="mb-1">Number of Bed room <span class="text-danger">*</span></label>
                              <select v-model="form.bad" class="form-select bg-color" :class="{'is-invalid' : errors.bad}">
                                  <option value="">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5+</option>
                              </select>
                              <small v-if="errors.bad" class="text-danger">{{errors.bad[0]}}</small>
                          </div>
                          <div class="col-md-4 col-lg-3 col-sm-6 mb-2">
                              <label class="mb-1">Number of Washroom <span class="text-danger">*</span></label>
                              <select v-model="form.washroom" class="form-select bg-color" :class="{'is-invalid' : errors.washroom}">
                                  <option value="">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5+">5+</option>
                              </select>
                               <small v-if="errors.washroom" class="text-danger">{{errors.washroom[0]}}</small>
                          </div>
                          <div class="col-md-4 col-lg-3 col-sm-6 mb-2">
                              <label class="mb-1">Number of Balcony <span class="text-danger">*</span></label>
                              <select v-model="form.balcony" class="form-select bg-color" :class="{'is-invalid' : errors.balcony}">>
                                  <option value="">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5+">5+</option>
                              </select>
                              <small v-if="errors.balcony" class="text-danger">{{errors.balcony[0]}}</small>
                          </div>
                          <div class="col-md-4 col-lg-3 col-sm-6 mb-2">
                              <label class="mb-1">Floor Position <span class="text-danger">*</span></label>
                              <select v-model="form.position" class="form-select bg-color" :class="{'is-invalid' : errors.position}">>
                                <option value="">0</option>
                                <option v-for="(n,index) in 50" :key="index" :value="String(n)">{{n}}</option>
                              </select>
                              <small v-if="errors.position" class="text-danger">{{errors.position[0]}}</small>
                          </div>
                      </div>
                      <div class="">
                          <input type="checkbox" name="" id="Available-Dining-space">
                          <label for="Available-Dining-space" class="font-14">Available Dining space</label>
                      </div>

                      <h3 class="font-20 bold mt-3">Others Benefit</h3>
                      <div class="row">
                          <div class="col-md-3 col-sm-6 mb-2">
                              <input type="checkbox" v-model="form.lift" true-value="1" false-value="0" class="btn-check" id="Lift-service" autocomplete="off">
                              <label class="services form-control" for="Lift-service">
                                  <i class="fa-solid fa-circle-dot icon"></i>
                                  <span> Lift service</span>
                              </label>
                          </div>
                          <div class="col-md-3 col-sm-6 mb-2">
                              <input type="checkbox" v-model="form.generator" true-value="1" false-value="0" class="btn-check" id="Generator-service" autocomplete="off">
                              <label class="services form-control" for="Generator-service">
                                  <i class="fa-solid fa-circle-dot icon"></i>
                                  <span> Generator service</span>
                              </label>
                          </div>
                          <div class="col-md-3 col-sm-6 mb-2">
                              <input type="checkbox" v-model="form.guard" true-value="1" false-value="0" class="btn-check" id="Security-guard" autocomplete="off">
                              <label class="services form-control" for="Security-guard">
                                  <i class="fa-solid fa-circle-dot icon"></i>
                                  <span> Security guard</span>
                              </label>
                          </div>
                          <div class="col-md-3 col-sm-6 mb-2">
                              <input type="checkbox" v-model="form.parking" true-value="1" false-value="0" class="btn-check" id="Parking-space" autocomplete="off">
                              <label class="services form-control" for="Parking-space">
                                  <i class="fa-solid fa-circle-dot icon"></i>
                                  <span> Parking space</span>
                              </label>
                          </div>
                          <div class="col-md-3 col-sm-6 mb-2">
                              <input type="checkbox" v-model="form.gas" true-value="1" false-value="0" class="btn-check" id="Gas-service" autocomplete="off">
                              <label class="services form-control" for="Gas-service">
                                  <i class="fa-solid fa-circle-dot icon"></i>
                                  <span> Gas service</span>
                              </label>
                          </div>
                          <div class="col-md-3 col-sm-6 mb-2">
                              <input type="checkbox" v-model="form.internet" true-value="1" false-value="0" class="btn-check" id="Internet-Wifi" autocomplete="off">
                              <label class="services form-control" for="Internet-Wifi">
                                  <i class="fa-solid fa-circle-dot icon"></i>
                                  <span> Internet/Wifi</span>
                              </label>
                          </div>
                      </div>

                      <h3 class="font-20 bold mt-2">Rent details</h3>
                      <div class="row">
                          <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                              <label for="" class="mb-1">Amount or Rent</label>
                              <div class="rent-box">
                                  <input type="number" v-model="form.rent_price" placeholder="000" class="form-control bg-color" :class="{'is-invalid' : errors.rent_price}">
                                  <span class="currency">{{symbol}}</span>
                                  <span class="duration">Per Month</span>
                              </div>
                               <small v-if="errors.rent_price" class="text-danger">{{errors.rent_price[0]}}</small>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                              <label for="" class="mb-1">Electricity bill</label>
                              <div class="rent-box">
                                  <input type="number" v-model="form.electric_bill"  placeholder="00" class="form-control bg-color" :class="{'is-invalid' : errors.electric_bill}">
                                  <span class="currency">{{symbol}}</span>
                                  <span class="duration">Per Month</span>
                              </div>
                              <small v-if="errors.electric_bill" class="text-danger">{{errors.electric_bill[0]}}</small>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                              <label for="" class="mb-1">Gas bill</label>
                              <div class="rent-box">
                                  <input type="number" v-model="form.gas_bill" placeholder="00" class="form-control bg-color" :class="{'is-invalid' : errors.gas_bill}">
                                  <span class="currency">{{symbol}}</span>
                                  <span class="duration">Per Month</span>
                              </div>
                              <small v-if="errors.gas_bill" class="text-danger">{{errors.gas_bill[0]}}</small>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                              <label for="" class="mb-1">Water bill</label>
                              <div class="rent-box">
                                  <input type="number" v-model="form.water_bill" placeholder="00" class="form-control bg-color" :class="{'is-invalid' : errors.water_bill}">
                                  <span class="currency">{{symbol}}</span>
                                  <span class="duration">Per Month</span>
                              </div>
                              <small v-if="errors.water_bill" class="text-danger">{{errors.water_bill[0]}}</small>
                          </div>
                          <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                              <label for="" class="mb-1">Service charge</label>
                              <div class="rent-box">
                                  <input type="number" v-model="form.service_bill" placeholder="00" class="form-control bg-color" :class="{'is-invalid' : errors.service_bill}">
                                  <span class="currency">{{symbol}}</span>
                                  <span class="duration">Per Month</span>
                              </div>
                              <small v-if="errors.service_bill" class="text-danger">{{errors.service_bill[0]}}</small>
                          </div>
                      </div>
                      <div class="">
                          <input type="checkbox" v-model="form.negotiable" true-value="1" false-value="0" id="Negotiable">
                          <label for="Negotiable" class="font-14">Negotiable</label>
                      </div>

                      <h3 class="font-20 bold mt-2">Rental information</h3>
                      <div class="row">
                          <div class="col-sm-6 col-md-4 mb-2">
                              <label for="" class="mb-1">Rent will be from which month <span class="text-danger">*</span></label>
                              <input type="date" v-model="form.available_from" class="form-control bg-color" :class="{'is-invalid' : errors.available_from}">
                              <small v-if="errors.available_from" class="text-danger">{{errors.available_from[0]}}</small>
                          </div>
                          <div class="col-sm-6 col-md-4 mb-2">
                              <label class="mb-1">City <span class="text-danger">*</span></label>
                              <select v-model="form.city" class="form-select bg-color" :class="{'is-invalid' : errors.city}">
                                  <option value="">Select City</option>
                                  <option v-for="city in allCityList" :key="city.id" :value="city.id">{{city.name}}</option>
                              </select>
                              <small v-if="errors.city" class="text-danger">{{errors.city[0]}}</small>
                          </div>
                          <div class="col-sm-6 col-md-4 mb-2">
                              <label class="mb-1">Area <span class="text-danger">*</span></label>
                              <select v-model="form.area" class="form-select bg-color" :class="{'is-invalid' : errors.area}">
                                  <option value="">Select Area</option>
                                  <option v-for="area in cityWiseAreaList" :key="area.id" :value="area.id">{{area.name}}</option>
                              </select>
                              <small v-if="errors.area" class="text-danger">{{errors.area[0]}}</small>
                          </div>
                          <div class="col-sm-12">
                              <label class="mb-1">Address <span class="text-danger">*</span></label>
                              <input type="text" v-model="form.address" class="form-control bg-color" placeholder="Write full address of rental house" :class="{'is-invalid' : errors.address}">
                              <small v-if="errors.address" class="text-danger">{{errors.address[0]}}</small>
                          </div>
                      </div>

                      <h3 class="font-18 bold mt-3">About rental house <span class="text-danger">*</span></h3>
                      <div class="row">
                          <div class="col-12">
                              <textarea v-model="form.description" rows="5" class="form-control bg-color" placeholder="Write something about your house" :class="{'is-invalid' : errors.description}">
                              </textarea>
                              <small v-if="errors.description" class="text-danger">{{errors.description[0]}}</small>
                          </div>
                      </div>

                      <div class="mt-5 d-flex justify-content-between">
                          <button type="button" class="btn btn-back px-4" @click="backStep('StepTwoShow','StepOneShow')">
                              <img src="/images/icon/arrow.png" width="18"> Back
                          </button>
                          <button type="button" class="btn btn-primary px-4" @click.prevent="stepThree()">
                               Next <img src="/images/icon/right-arrow.png" width="18">
                          </button>
                      </div>

                  </div>

                  <!-- Step3 -->
                  <div v-if="StepThreeShow" class="step3">
                      <h3 class="font-20 bold mt-2">Upload featured image <span class="text-danger">*</span></h3>
                      <div class="section">

                          <div v-for="(preview, index) in feature_image" :key="index" class="feature">
                              <img :src="preview.src" class="fullImage">
                              <input type="file" :id="'feature'+index" style="display: none;" accept="image/*" @change="changeFeaturePhoto($event,index)"/>
                              <div class="feature-action">
                                  <label class="cancle" :for="'feature'+index">
                                      <img src="/images/icon/edit-image.png">
                                      <span class="ps-2">Change Photo</span>
                                  </label>
                              </div>
                          </div>

                          <div v-if="feature_image.length < 4" class="feature">
                              <img src="/images/Post-Ad-Step-1/defaultFeture.png" class="normalImage">
                              <input type="file" id="uploadFeature" style="display: none;" accept="image/*" @change="uploadFeaturePhoto($event)">
                              <div class="feature-action">
                                  <label for="uploadFeature" class="upload">
                                      <img src="/images/upload.png" width="17">
                                      <span class="ps-2">Upload image</span>
                                  </label>
                              </div>
                          </div>

                      </div>
                      <div class="py-md-3"></div>
                      <div class="mt-5 mb-2 d-flex justify-content-between">
                          <button class="btn btn-back px-4" @click="backStep('StepThreeShow','StepTwoShow')">
                              <img src="/images/icon/arrow.png" width="18"> Back
                          </button>
                          <button class="btn btn-primary px-4" type="button" @click="updatePost()"> Finish</button>
                      </div>
                  </div>

              </form>


            </div>
        </div>

    </div>
  </template>

  <script>
import { mapGetters } from 'vuex'
import moment from 'moment'
  export default {
    data() {
      return {
        StepOneShow: true,
        StepTwoShow: false,
        StepThreeShow: false,

        form: {
          type: '',
          title: '',
          description: '',
          washroom: '',
          balcony: '',
          position: '',
          bad: '',
          available_from: '',
          city: '',
          area: '',
          address: '',
          rent_price: '',
          electric_bill: '',
          water_bill: '',
          gas_bill: '',
          service_bill: '',
          negotiable: 0,
          others_bill: '',
          male_student: 0,
          female_student: 0,
          man_job: 0,
          women_job: 0,
          any: 0,
          lift: 0,
          generator: 0,
          guard: 0,
          parking: 0,
          gas: 0,
          internet: 0,
          islam: 1,
          hindu: 0,
          christian: 0,
          bouddho: 0,
          any_religion: 0,
        },
        allCityList: '',
        cityWiseAreaList: '',

        feature_image: [],

        errors: [],
        stepErrors:{
          type: '',
          title: '',
        }

      }
    },
    computed:mapGetters({
        isLogin: 'auth/isLoggedIn',
        symbol: "currency/getSymbol",
    }),
    mounted() {
      this.getCity()
      this.getRentDetails()
    },
    created() {
        if (!this.isLogin) {
            this.$router.push('/login-signup')
        }
    },
    watch: {
      'form.city': {
        handler: function(v) {
        this.getArea(this.form.city)
      }
      }
    },
    methods: {

        changeFeaturePhoto(event,index){
            const preview = URL.createObjectURL(event.target.files[0])
            const File = event.target.files[0];
            this.feature_image[index].src = preview
            if (this.feature_image[index].file) {
              this.feature_image[index].file = File
            }else{
              this.$set(this.feature_image[index],'file',File)
            }
        },

        uploadFeaturePhoto(event){
            const preview = URL.createObjectURL(event.target.files[0])
            const File = event.target.files[0];
            const array = {id: '', file: File,src: preview}
            this.feature_image.push(array)
        },

      stepTwo(){
          this.stepErrors.type = !this.form.type ? 'The rent type is required!' : '';
          this.stepErrors.title = !this.form.title ? 'The title field is required!' : '';
          if (this.stepErrors.type || this.stepErrors.title) {
            return false
          }
          this.StepOneShow = false
          this.StepTwoShow = true
          window.scrollTo(0,0);
      },
      stepThree(){
        if (this.form.bad && this.form.washroom && this.form.balcony && this.form.position && this.form.available_from && this.form.city && this.form.area && this.form.address && this.form.description) {
          this.StepOneShow = false
          this.StepTwoShow = false
          this.StepThreeShow = true
          window.scrollTo(0,0);
        }
      },

      backStep(currentStep,previewStep){
          this[currentStep] = false
          this[previewStep] = true
          window.scrollTo(0,0);
      },

    getCity(){
      this.$store.dispatch("rent/getCity").then( res => {
        this.allCityList = res.data.cities
      })
    },
    getArea(id){
      this.$store.dispatch("rent/getArea",'city_id='+id).then( res => {
        this.cityWiseAreaList = res.data.areas
      })
    },

    updatePost(){
      const updateData = new FormData()

      for (let [key, value] of Object.entries(this.form)) {
          updateData.append(key, value);
      }

      for( var i = 0; i < this.feature_image.length; i++ ){
        if (this.feature_image[i].file) {
          updateData.append('feature_image[' + i + '][id]', this.feature_image[i].id);
          updateData.append('feature_image[' + i + '][file]', this.feature_image[i].file);
        }
      }

      this.$store.commit("loader/SET_Loader",true)
      const id = this.$route.params.id;
      this.$store.dispatch("rent/updatePost",[updateData, id]).then( res => {
        this.$store.commit("loader/SET_Loader",false)
        this.$toast.success(res.message)
        this.$router.push('/my-ads')
      })
      .catch(err => {
        this.$store.commit("loader/SET_Loader",false)
        this.$toast.error(err.response.data.message)
        this.errors = err.response.data.errors
      })
    },

    getRentDetails() {
      this.$store.commit("loader/SET_Loader",true)
      this.$store.dispatch("rent/rentDetails", this.$route.params.id).then(res => {
        this.form.type = res.data.rent.type
        this.form.title = res.data.rent.title
        this.form.description = res.data.rent.description
        this.form.washroom = res.data.rent.washroom
        this.form.balcony = res.data.rent.balcony
        this.form.position = res.data.rent.position
        this.form.bad = res.data.rent.bad
        this.form.city = res.data.rent.rent_info.city.id;
        this.form.area = res.data.rent.rent_info.area.id
        this.form.address = res.data.rent.rent_info.address
        this.form.rent_price = res.data.rent.charges.rent_price
        this.form.electric_bill = res.data.rent.charges.electric
        this.form.water_bill = res.data.rent.charges.water
        this.form.gas_bill = res.data.rent.charges.gas
        this.form.service_bill = res.data.rent.charges.service
        this.form.negotiable = res.data.rent.charges.negotiable
        this.form.others_bill = res.data.rent.charges.others === ''? 0 : 1;
        this.form.male_student = res.data.rent.for_rent.male_student
        this.form.female_student = res.data.rent.for_rent.female_student
        this.form.man_job = res.data.rent.for_rent.man_job
        this.form.women_job = res.data.rent.for_rent.women_job
        this.form.any = res.data.rent.for_rent.any
        this.form.lift = res.data.rent.benefits.lift
        this.form.generator = res.data.rent.benefits.generator
        this.form.guard = res.data.rent.benefits.guard
        this.form.parking = res.data.rent.benefits.parking
        this.form.gas = res.data.rent.benefits.gas
        this.form.internet = res.data.rent.benefits.internet
        this.form.islam = res.data.rent.religion.islam
        this.form.hindu = res.data.rent.religion.hindu
        this.form.christian = res.data.rent.religion.christian
        this.form.bouddho = res.data.rent.religion.bouddho
        this.form.any_religion = res.data.rent.religion.any
        this.form.available_from = this.format_date(res.data.rent.rent_info.available_from)
        this.feature_image = res.data.rent.thumbnails

        this.$store.commit("loader/SET_Loader",false)
      }).catch(err=>{
        this.$store.commit("loader/SET_Loader",false)
        console.log(err);
      });
    },

    format_date(value){
         if (value) {
           return moment(String(value)).format('YYYY-MM-DD')
          }
      },

    },

  }
  </script>

  <style scoped>
  .fullImage{
      width: 100%;
      height: 100%;
  }
  .normalImage{
      width: auto;
      height: auto;
  }
  .upload,.cancle{
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      border: none;
      background: none;
  }

  .feature{
      width: 188px;
      height: 190px;
      border: 1px solid #F0F4F8;
      position: relative;
      border-radius: 5px;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      float: left;
      margin-right: 20px;
      margin-top: 16px;
  }

  .feature-action{
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 40px;
      background: rgb(255 255 255 / 50%);
      border-radius: 0px 0px 5px 5px;
      font-size: 15px;
  }

  .btn-back{
      background: #F5F5F5;
      color: #808080;
  }
  .rent-box{
      position: relative;
  }
  .rent-box .form-control{
    padding-right: 75px;
    padding-left: 20px;
  }
  .duration,.currency{
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      color: #BFBFBF;
  }
  .duration{
    right: 10px;
    font-size: 14px;
  }
  .currency{
    left: 10px;
    color: #495057 !important;
  }
  .form-control,.form-select{
    border-color: #F0F4F8;
  }
  .services .icon{
      font-size: 14px;
      color: #F0F4F8;
  }
  .services.form-control{
      color: #000;
      cursor: pointer;
  }
  .btn-check:checked+.services.form-control{
      border-color: #3B54FF !important;
  }
  .btn-check:checked+.services .icon{
      color: #3B54FF !important;
  }
  .section{
      width: 100%;
      overflow: hidden;
  }

  .item{
      float: left;
      margin-right: 16px;
  }
  .box{
      width: 90px;
      height: 102px;
      border: 1px solid #F0F4F8;
      text-align: center;
      border-radius: 2px;
      cursor: pointer;
      position: relative;
  }
  .checkIcon{
      position: absolute;
      top: 3px;
      right: 4px;
      color: #3B54FF;
      font-size: 12px;
      display: none;
  }
  .box img{
      height: 42px;
      margin-top: 12px;
      filter: grayscale(100%);
  }
  .box-text{
      font-size: 14px;
      color: #808080;
      line-height: 20px;
      margin-top: 2px;
  }

   .btn-check:checked+.box{
       border-color: #3B54FF;
   }
   .btn-check:checked+.box img{
      filter: grayscale(0);
   }
   .btn-check:checked+.box .box-text{
      color: #3B54FF !important;
   }
   .btn-check:checked+.box .checkIcon{
      display: block;
   }


  .nav{
      border-bottom: 1px solid #ddd;
  }
  .nav .nav-item{
      padding: 5px 12px;
      font-size: 18px;
      color: #808080;
  }
  .nav-item.active{
      border-bottom: 2px solid #3B54FF;
      color: #3B54FF !important;
  }

  @media screen and (max-width:490px){
      .feature{
          width: 138px;
          height: 140px;
      }
  }
  @media screen and (max-width:375px){
      .feature{
          width: 100px;
          height: 102px;
      }
  }
  </style>
