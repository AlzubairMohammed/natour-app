<template>
  <div class="">
      <h3 class="font-20 bold">Change Password</h3>
      <form @submit.prevent="changePassword">
      <div class="profile-image">
        <img src="/images/forgot-password.png">
      </div>
      
      <div class="row">
        <div class="col-md-8 m-auto">

          <label class="form-label mb-1">Enter Current Password</label>
          <div class="mb-0 input">
            <input :type="showPassword1 ? 'text' : 'password'" v-model="passwordData.current_password" class="form-control" placeholder="Current Password" :class="{ 'is-invalid' : errors.current_password }">
             <button class="button" type="button" @click="toggleShow('showPassword1')">
                <span class="icon">
                  <img :src="showPassword1 ? '/images/eye.png' : '/images/hidden.png' "/>
                </span>
            </button>
          </div>
          <small v-if="errors.current_password" class="text-danger d-block">{{ errors.current_password[0] }}</small>

          <label class="form-label mb-1 mt-3">Create New Password</label>
          <div class="mb-0 input">
            <input :type="showPassword2 ? 'text' : 'password'" v-model="passwordData.password" class="form-control" placeholder="New Password" :class="{ 'is-invalid' : errors.password }">
            <button class="button" type="button" @click="toggleShow('showPassword2')">
              <span class="icon ">
                <img :src="showPassword2 ? '/images/eye.png' : '/images/hidden.png' "/>
              </span>
          </button>
          </div>
          <small v-if="errors.password" class="text-danger d-block">{{ errors.password[0] }}</small>

          <label class="form-label mb-1 mt-3">Confirm Password</label>
          <div class="mb-0 input">
              <input :type="showPassword3 ? 'text' : 'password'" v-model="passwordData.password_confirmation" class="form-control" placeholder="Confirm Password">
              <button class="button" type="button" @click="toggleShow('showPassword3')">
                <span class="icon ">
                  <img :src="showPassword3 ? '/images/eye.png' : '/images/hidden.png' "/>
                </span>
              </button>
          </div>

          <div class="d-flex justify-content-between mt-5">
            <nuxt-link to="/profile" class="btn font-18"><i class="fa-solid fa-arrow-left"></i> Back</nuxt-link>

            <button v-if="isLoading" class="custom-btn" type="button" disabled>
              <span class="spinner-border spinner-border-sm"></span>
              Loading...
            </button>
            <button v-else type="submit" class="custom-btn">Change Password</button>
          </div>

        </div>
      </div>
      </form>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default { 
    layout: 'dashboard',
    data() {
      return {
        isLoading: false,
        showPassword1: false,
        showPassword2: false,
        showPassword3: false,
        passwordData:{
          current_password: '',
          password: '',
          password_confirmation: '',
        },
        errors: '',
      }
    },
    computed:{
      ...mapGetters({
        isLoggedIn: 'auth/isLoggedIn'
      }),
    },
    created() {
      if(!this.isLoggedIn){
        this.$router.push('/')
      }
    },
    methods: {
      changePassword(){
        this.isLoading =true
        this.$store.dispatch('auth/changePassword', this.passwordData)
        .then(res => {
          this.isLoading = false
          this.$toast.success(res.message)
          this.passwordData.current_password = null
          this.passwordData.password = null
          this.passwordData.password_confirmation = null
        })
        .catch(err => {
          this.isLoading = false
          this.$toast.error(err.response.data.message)
          if (err.response.data.errors) {
            this.errors = err.response.data.errors
          }else{
            this.errors.current_password = ''
            this.errors.password = ''
          }
        })
      },
      toggleShow(password){
        this[password] = !this[password]
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
top: 6px;
border: none;
background:  none;
}
.icon>img{
  width: 24px;
}
label{
  font-size: 18px;
}
input{
  padding-right: 32px;
  font-size: 18px;
}
.profile-image{
  width: 90px;
  height: 90px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 10px auto 6px auto;
  background: #ebebeb;
}
.profile-image img{
  width: 80%;
  height: 80%;
}

.custom-btn{
  padding: 8px 16px;
  color: #fff;
  background: linear-gradient(98deg, #3B99FE 0%, #3b54ff 100%) 0% 0% no-repeat padding-box;
  border: none;
  border-radius: 4px;
  font-size: 18px;
}
</style>