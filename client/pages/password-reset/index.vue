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
              <h3 class="title">Recover Password</h3>
          </div>
        <form @submit.prevent="sendOTP">

            <label class="font-18 mb-1">Phone number</label>
            <div class="input-group">
                <input type="number" v-model="contact" class="form-control font-18" placeholder="Enter Phone Number" :class="{ 'is-invalid' : error}">
            </div>
            <small v-if="error" class="text-danger d-block">{{error}}</small>

            <div class="mt-4">
              <button v-if="isLoading" class="btn bg-custom w-100 py-1" type="button"><b-spinner variant="white" label="Spinning"></b-spinner></button>
              <button v-else class="btn bg-custom w-100 py-2" type="submit">Submit</button>
            </div>

        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  layout: "blank",
data() {
  return {
    isLoading: false,
    contact: '',
    error: '',
  }
},
methods: {
  sendOTP(){
      this.isLoading = true
      this.$store.dispatch('auth/recoveryPassword', {contact: this.contact})
      .then(res => {
        this.isLoading = false
        this.error = null
        this.$toast.success(res.message)
        this.$store.commit('auth/SET_CONTACT', this.contact)
        this.$router.push('/recover-otp-verify')
      })
      .catch(err => {
        this.isLoading = false
        this.error = ''
        if (err.response.data.errors) {
          this.error = err.response.data.errors.contact[0]
        }
        this.$toast.error(err.response.data.message)
      })
    }
},
}
</script>

<style scoped>
.title{
    font-size: 28px;
}
input{
    color: #000;
}
.flag{
    border: 1px solid #ced4da;
    color: #808080;
    background: transparent;
}
.flag img{
    width: 32px;
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
.main-content{
    padding: 20px;
}
@media screen and (max-width: 568px){
    .body-content{
        width: 380px;
        top: 0 !important;
        transform: translate(-50%,0);
    }
}
@media screen and (max-width: 425px){
    .body-content{
        width: 320px;
    }
}
</style>
