<template>
  <div class="services-details bg-color py-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="card card-body border-0 rounded-0">
            <div class="row">
              <div class="col-md-5 pe-md-1">
                <p class="title">{{ rent.title }}</p>
                <div class="locaton d-flex">
                  <div class="icon">
                    <i class="fa-solid fa-location-dot"></i>
                  </div>
                  <div class="address">
                    <p class="m-0">{{ rent_info.address }}</p>
                  </div>
                </div>

                <div class="border"></div>

                <div class="feature mt-2">
                  <div class="row">
                    <div class="col-6">
                      <div class="item">
                        <div>
                          <img src="/images/Rent-details-icon/Flat Rent.svg" />
                        </div>
                        <p class="m-0 font-14">{{ rent.type }}</p>
                      </div>
                      <div class="item">
                        <div>
                          <img src="/images/Rent-details-icon/Calendar.svg" />
                        </div>
                        <p class="m-0 font-14">
                          {{ rent_info.available_from }}
                        </p>
                      </div>
                      <div class="item">
                        <div>
                          <img src="/images/Rent-details-icon/bed room.svg" />
                        </div>
                        <p class="m-0 font-14">{{ rent.bad }} Bed Room</p>
                      </div>
                      <div class="item">
                        <div>
                          <img src="/images/Rent-details-icon/muslim.svg" />
                        </div>
                        <p class="m-0 font-14">
                          <span v-if="religion.islam">Islam</span>
                          <span v-if="religion.hindu">,Hindu</span>
                          <span v-if="religion.christian">,Christian</span>
                          <span v-if="religion.bouddho">,Bouddho</span>
                          <span v-if="religion.any">,Any</span>
                        </p>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="item">
                        <div>
                          <img src="/images/Rent-details-icon/Wash Room.svg" />
                        </div>
                        <p class="m-0 font-14">{{ rent.washroom }} Wash Room</p>
                      </div>
                      <div class="item">
                        <div>
                          <img src="/images/Rent-details-icon/Balcony.svg" />
                        </div>
                        <p class="m-0 font-14">{{ rent.balcony }} Balcony</p>
                      </div>
                      <div class="item">
                        <div class="img">
                          <img src="/images/Rent-details-icon/Floor.svg" />
                        </div>
                        <p class="m-0 font-14">{{ rent.position }} Floor</p>
                      </div>
                      <div class="item">
                        <div class="img">
                          <img
                            src="/images/Rent-details-icon/For Student &.svg"
                          />
                        </div>
                        <p class="m-0 font-14">
                          For
                          <span
                            v-if="
                              for_rent.male_student &&
                              for_rent.female_student &&
                              for_rent.man_job &&
                              for_rent.women_job
                            "
                            >Student & Job Holder</span
                          >

                          <span
                            v-else-if="
                              for_rent.male_student && for_rent.female_student
                            "
                            >Student</span
                          >

                          <span v-else-if="for_rent.male_student"
                            >Male Student</span
                          >
                          <span v-else-if="for_rent.female_student"
                            >Female student</span
                          >
                          <span
                            v-else-if="for_rent.man_job && for_rent.women_job"
                            >Job Holder</span
                          >
                          <span v-else-if="for_rent.man_job"
                            >Male Job Holder</span
                          >
                          <span v-else-if="for_rent.women_job"
                            >Female Job Holder</span
                          >
                          <span v-if="for_rent.any">Any</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="Other mt-2">
                  <p class="font-18 bold">Other charges</p>
                  <div class="row">
                    <div class="col-6">
                      <div class="item">
                        <div>
                          <img
                            src="/images/Rent-details-icon/Other-charges/Electricity Bill.svg"
                          />
                        </div>
                        <span class="m-0 font-14"
                          >{{ symbol }}{{ charges.electric }} Electricity
                          Bill</span
                        >
                      </div>
                      <div class="item">
                        <div>
                          <img
                            src="/images/Rent-details-icon/Other-charges/Gas Bill.svg"
                          />
                        </div>
                        <span class="m-0 font-14"
                          >{{ symbol }}{{ charges.gas }} Gas Bill</span
                        >
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="item">
                        <div>
                          <img
                            src="/images/Rent-details-icon/Other-charges/Water Bill.svg"
                          />
                        </div>
                        <span class="m-0 font-14"
                          >{{ symbol }}{{ charges.water }} Water Bill</span
                        >
                      </div>
                      <div class="item">
                        <div>
                          <img
                            src="/images/Rent-details-icon/Other-charges/Service.svg"
                          />
                        </div>
                        <span class="m-0 font-14"
                          >{{ symbol }}{{ charges.service }} Service
                          Charge</span
                        >
                      </div>
                    </div>
                  </div>
                </div>

                <div class="other-benifit">
                  <p class="font-18 bold mb-2">Other Benefits</p>

                  <span v-b-popover.hover.top="'ok'">
                    <!-- <b-popover target="link-button" title="Popover title" triggers="focus">
                  Popover content
                </b-popover> -->
                    <div
                      class="benefit"
                      :class="benefits.lift ? '' : 'error'"
                      v-b-popover.hover.top="'Lift'"
                    >
                      <img src="/images/Other-Benefits-icon/Lift.svg" />
                      <div v-if="benefits.lift" class="status">
                        <img src="/images/check.png" />
                      </div>
                      <div v-else class="status error">
                        <img src="/images/close.png" />
                      </div>
                    </div>
                  </span>

                  <div
                    class="benefit"
                    :class="benefits.generator ? '' : 'error'"
                    v-b-popover.hover.top="'Generator'"
                  >
                    <img src="/images/Other-Benefits-icon/Generator.svg" />
                    <div v-if="benefits.generator" class="status ok">
                      <img src="/images/check.png" />
                    </div>
                    <div v-else class="status error">
                      <img src="/images/close.png" />
                    </div>
                  </div>

                  <div
                    class="benefit"
                    :class="benefits.gas ? '' : 'error'"
                    v-b-popover.hover.top="'Gas-service'"
                  >
                    <img src="/images/Other-Benefits-icon/gas-service.svg" />
                    <div v-if="benefits.gas" class="status">
                      <img src="/images/check.png" />
                    </div>
                    <div v-else class="status error">
                      <img src="/images/close.png" />
                    </div>
                  </div>

                  <div
                    class="benefit"
                    :class="benefits.parking ? '' : 'error'"
                    v-b-popover.hover.top="'Parking'"
                  >
                    <img src="/images/Other-Benefits-icon/parking.svg" />
                    <div v-if="benefits.parking" class="status">
                      <img src="/images/check.png" />
                    </div>
                    <div v-else class="status error">
                      <img src="/images/close.png" />
                    </div>
                  </div>

                  <div
                    class="benefit"
                    :class="benefits.guard ? '' : 'error'"
                    v-b-popover.hover.top="'Security gurd.'"
                  >
                    <img src="/images/Other-Benefits-icon/security gurd.svg" />
                    <div v-if="benefits.guard" class="status">
                      <img src="/images/check.png" />
                    </div>
                    <div v-else class="status error">
                      <img src="/images/close.png" />
                    </div>
                  </div>

                  <div
                    class="benefit"
                    :class="benefits.internet ? '' : 'error'"
                    v-b-popover.hover.top="'WIFI'"
                  >
                    <img src="/images/Other-Benefits-icon/WIFI service.svg" />
                    <div v-if="benefits.internet" class="status">
                      <img src="/images/check.png" />
                    </div>
                    <div v-else class="status error">
                      <img src="/images/close.png" />
                    </div>
                  </div>
                </div>
              </div>

              <!-- carousel -->
              <div class="col-md-7">
                <div v-if="!loader && thumbnails != ''">
                  <CarouselRentDetails :thumbnails="thumbnails" />
                </div>

                <div class="about-house">
                  <p class="font-20 bold">About House</p>
                  <p class="desc">
                    {{ rent.description }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card card-body rounded-0 border-0 h-100">
            <p class="font-14">Amount of Rent</p>
            <h3 class="rent-title text-green">
              {{ symbol }}{{ charges.rent_price }}/Month
            </h3>

            <div class="border my-3"></div>

            <div class="author">
              <p class="font-14">Posted by</p>
              <div class="auth d-flex mt-2">
                <img class="avatar" :src="user.profile_photo" />
                <div class="info ms-2">
                  <p class="font-16 bold">{{ user.name }}</p>
                  <p class="font-14 text-gray">
                    <span v-if="!loader && !phoneNumberShow"
                      >{{ user.contact.substring(0, 5) }}XXXXXX</span
                    >
                    <span v-if="!loader && phoneNumberShow">{{
                      user.contact
                    }}</span>
                  </p>
                </div>
              </div>
              <div class="number-btn text-center mt-2">
                <button
                  class="btn btn-primary font-14 w-100"
                  @click="toggleContact"
                >
                  <span v-if="!phoneNumberShow">See</span>
                  <span v-else>Hide</span> Phone Number
                </button>
              </div>
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
  data() {
    return {
      id: "",
      rent: "",
      user: "",
      rent_info: "",
      for_rent: "",
      thumbnails: "",
      benefits: "",
      charges: "",
      religion: "",
      loader: true,

      phoneNumberShow: false,
    };
  },
  computed: {
    ...mapGetters({
      symbol: "currency/getSymbol",
      isLogging: "auth/isLoggedIn",
    }),
  },
  mounted() {
    this.id = this.$route.params.id;
    this.rentDetails();
  },
  methods: {
    rentDetails() {
      this.$store.commit("loader/SET_Loader", true);
      this.$store
        .dispatch("rent/rentDetails", this.$route.params.id)
        .then((res) => {
          this.rent = res.data.rent;
          this.user = res.data.rent.user;
          this.rent_info = res.data.rent.rent_info;
          this.for_rent = res.data.rent.for_rent;
          this.thumbnails = res.data.rent.thumbnails;
          this.benefits = res.data.rent.benefits;
          this.charges = res.data.rent.charges;
          this.religion = res.data.rent.religion;

          this.$store.commit("loader/SET_Loader", false);
          this.loader = false;
        })
        .catch((err) => {
          this.loader = false;
          console.log(err);
        });
    },

    toggleContact() {
      if (!this.isLogging) {
        this.$toast.error("Please Login to see phone number");
        return false;
      }
      this.phoneNumberShow = !this.phoneNumberShow;
    },
  },
};
</script>

<style scoped>
.about-house {
  margin-top: 16px;
  padding-top: 16px;
  border-top: 1px solid #ddd;
}
.desc {
  font-size: 14px;
  color: #000;
  line-height: 20px;
  margin-top: 6px;
}
.title {
  font-size: 18px;
  font-weight: 600;
  line-height: 24px;
}
.locaton {
  margin: 12px 0;
}
.locaton .icon {
  width: 24px;
  height: 24px;
  color: #808080;
  margin-right: 4px;
}
.locaton .address {
  color: #808080;
  font-size: 14px;
}
.feature .item,
.item {
  display: flex;
  column-gap: 8px;
  margin: 6px 0;
}
.benefit {
  width: 70px;
  height: 70px;
  border: 1px solid #f0f4f8;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  float: left;
  margin-right: 5px;
  margin-bottom: 5px;
}
.benefit.error img {
  filter: grayscale(100%);
}
.status {
  position: absolute;
  top: -4px;
  right: 4px;
}
.status.error > img {
  width: 11px;
  opacity: 1;
  filter: grayscale(0%) !important;
}
.status > img {
  width: 14px;
}
.rent-title {
  font-size: 26px;
}
.avatar {
  width: 46px;
  height: 46px;
}
</style>
