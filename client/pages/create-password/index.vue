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
              <h3 class="title">Create Password</h3>
          </div>
        <form @submit.prevent="resetPassword">

          <label class="form-label mb-1">Create New Password</label>
          <div class=" input">
            <input :type="showPasswordCurrent ? 'text' : 'password' " name="" v-model="password" class="form-control" placeholder="Enter New Password" :class="{ 'is-invalid' : error }">
            <button class="button" type="button" @click="toggleShowCurrent">
              <span class="icon ">
                <i class="fas" :class="showPasswordCurrent ? 'fa-eye' : 'fa-eye-slash' "></i>
              </span>
          </button>
          </div>
          <small v-if="error" class="text-danger d-block">{{error}}</small>

          <label class="form-label mb-1 mt-2">Confirm Password</label>
          <div class="">
              <input :type="showPasswordCurrent ? 'text' : 'password' " v-model="password_confirmation" class="form-control" placeholder="Confirm Password">
          </div>

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
import { mapGetters } from 'vuex'
export default {
  layout: "blank",
data() {
  return {
    showPasswordCurrent: false,
    isLoading: false,
    password: '',
    password_confirmation: '',
    error: '',
  }
},
computed:mapGetters({
  token: 'auth/getRestPasswordToken'
}),
methods: {
  resetPassword(){
      this.isLoading = true
      this.$store.dispatch('auth/resetPassword', {
        password: this.password,
        password_confirmation: this.password_confirmation,
        token: this.token
      })
      .then(res => {
        this.isLoading = false
        this.error = null
        this.$toast.success(res.message)
        this.$store.commit('auth/SET_RESET_PASSWORD_TOKEN',null)
        this.$router.push('/login-signup')
      })
      .catch(err => {
        this.isLoading = false
        this.error = ''
        if (err.response.data.errors) {
          this.error = err.response.data.errors.password[0]
        }
        this.$toast.error(err.response.data.message)
      })
    },

     toggleShowCurrent(){
        this.showPasswordCurrent = !this.showPasswordCurrent
      }
},
}
</script>

<style scoped>
.input{
  position: relative;
}
.input .button{
position: absolute;
right: 6px;
top: 8px;
border: none;
background:  none;
}
label{
  font-size: 16px;
}
input{
  padding-right: 32px;
  font-size: 18px;
  color: #000;
}
.title{
    font-size: 28px;
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
