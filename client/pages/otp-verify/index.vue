<template>
  <div class="body">
    <div class="body-content">
      <div class="header">
        <nuxt-link to="/">
          <img src="/images/logo.svg" />
        </nuxt-link>
      </div>
      <div class="main-content">
        <div>
          <h3 class="title">OTP Verification</h3>
          <p class="text-gray mb-3">
            Enter the OTP sent to +88 {{ contact.substring(0, 3) }}*****{{
              contact.substring(8, 11)
            }}
          </p>
        </div>
        <form @submit.prevent="otpVarification" class="form-inline mb-3">
          <div class="row">
            <div class="col-2 p-2">
              <b-form-input
                id="OTPinput"
                v-model="code1"
                type="text"
                class="otp"
                placeholder="_"
                required
                v-on:keyup="tabChange(1)"
              ></b-form-input>
            </div>
            <div class="col-2 p-2">
              <b-form-input
                id="OTPinput"
                v-model="code2"
                type="text"
                class="otp"
                placeholder="_"
                required
                v-on:keyup="tabChange(2)"
              ></b-form-input>
            </div>
            <div class="col-2 p-2">
              <b-form-input
                id="OTPinput"
                v-model="code3"
                type="text"
                class="otp"
                placeholder="_"
                required
                v-on:keyup="tabChange(3)"
              ></b-form-input>
            </div>
            <div class="col-2 p-2">
              <b-form-input
                id="OTPinput"
                v-model="code4"
                type="text"
                class="otp"
                placeholder="_"
                required
                v-on:keyup="tabChange(4)"
              ></b-form-input>
            </div>
            <div class="col-2 p-2">
              <b-form-input
                id="OTPinput"
                v-model="code5"
                type="text"
                class="otp"
                placeholder="_"
                required
                v-on:keyup="tabChange(5)"
              ></b-form-input>
            </div>
            <div class="col-2 p-2">
              <b-form-input
                id="OTPinput"
                v-model="code6"
                type="text"
                class="otp"
                placeholder="_"
                required
                v-on:keyup="tabChange(6)"
              ></b-form-input>
            </div>
          </div>

          <div class="d-flex justify-content-between w-100">
            <a
              href="javascript:void"
              class="text-gray font-16 text-decoration-none"
              @click="reSendOtp"
              >Don't receive the OTP ?</a
            >
            <p class="text-green font-16">Remaining 00:60</p>
          </div>

          <button v-if="isLoading" class="btn bg-custom w-100 mt-4 py-1" type="button"><b-spinner variant="white" label="Spinning"></b-spinner></button>

          <button v-else class="btn bg-custom d-block w-100 py-2 mt-4" type="submit">Verify</button>

        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  layout: "blank",
  data() {
    return {
      isLoading: false,
      code1: "",
      code2: "",
      code3: "",
      code4: "",
      code5: "",
      code6: "",
    };
  },
  computed: mapGetters({
    contact: "auth/getContact",
  }),
  methods: {
    otpVarification() {
      this.isLoading = true
      this.$store
        .dispatch("auth/verifyOtp", {
          contact: this.contact,
          otp: this.code1 + this.code2 + this.code3 + this.code4 + this.code5 + this.code6,
        })
        .then((res) => {
          this.isLoading = false
          this.$store.commit("auth/SET_USER", res.data.user);
          this.$toast.success(res.message);
          this.$router.push('/')
        })
        .catch((err) => {
          this.isLoading = false
          this.$toast.error(err.response.data.message);
        });
    },

    reSendOtp() {
      this.isLoading = true
      this.$store
        .dispatch('auth/reSendOtp', this.contact)
        .then((response) => {
          this.isLoading = false
          this.$toast.success(response.message)
        })
        .catch((error) => {
          this.isLoading = false
          this.$toast.error(error.response.data.message)
        })
    },

    tabChange(val) {
      const ele = document.querySelectorAll("#OTPinput");
      if (val !== 6) {
        if (ele[val - 1].value !== "") {
          ele[val].focus();
        } else if (ele[val - 1].value === "") {
          ele[val - 1].focus();
        }
      }
    },
  },
};
</script>

<style scoped>
.title {
  font-size: 28px;
}
.otp {
  height: 100%;
  width: 100%;
  text-align: center;
  padding: 10px 15px;
  border: 1px solid #dbe2ed;
}
.body {
  width: 100%;
  height: 100vh;
  background: url("/images/Login-page-bg.jpg");
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  position: relative;
}
.body-content {
  position: absolute;
  width: 460px;
  height: auto;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #fff;
}
.header {
  padding: 24px 0;
  background: #f7f9fa;
  text-align: center;
}
.header img {
  height: 34px;
}
.main-content {
  padding: 20px;
}
@media screen and (max-width: 568px) {
  .body-content {
    width: 380px;
    top: 0 !important;
    transform: translate(-50%, 0);
  }
}
@media screen and (max-width: 425px) {
  .body-content {
    width: 320px;
  }
}
</style>
