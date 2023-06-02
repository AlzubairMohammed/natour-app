<template>
  <div class="">
      <h3 class="font-20 bold">My Profile</h3>
      <div class="profile-image">
        <img :src="profile_photo_preview ? profile_photo_preview : user_profile_photo">
        <label class="changes" for="change-photo"> <i class="fa-solid fa-camera"></i> </label>
        <input type="file" id="change-photo" style="display:none" @change='displayProfilePhoto'>
      </div>
      <p class="text-center" v-if="profileChange">
        <span class="cancleBtn" @click="cancleImg()">Cancle</span>
        <span class="changeBtn" @click="uploadProfileImg()">Change Photo</span>
        </p>
      <div class="row">
        <div class="col-md-8 m-auto">
          <form @submit.prevent="updateProfile">
          <div class="mb-2">
            <label class="form-label mb-1">First Name</label>
            <input type="text" v-model="profileData.first_name"  class="form-control">
          </div>
          <div class="mb-2">
            <label class="form-label mb-1">Last Name (Optional)</label>
            <input type="text" v-model="profileData.last_name" class="form-control">
          </div>
          <div class="mb-2">
            <label class="form-label mb-1">Email Address</label>
            <input type="text" v-model="profileData.email" class="form-control">
          </div>
          <div class="mb-2">
            <label class="form-label mb-1">Mobile Number</label>
            <input type="text" v-model="profileData.contact" class="form-control ">
          </div>

          <div class="">
            <nuxt-link to="/change-password" class="change-password">Change Password</nuxt-link>
          </div>

          <div class="d-flex justify-content-end mt-2">
            <button v-if="isLoading" class="custom-btn" type="button" disabled>
            <span class="spinner-border spinner-border-sm"></span>
            Loading...
          </button>
            <button v-else type="submit" class="custom-btn">Update</button>
          </div>

        </form>
        </div>
      </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default { 
    layout: 'dashboard',
    data() {
      return {
        isLoading: false,
        profileChange: false,
        profileData:{
          first_name: '',
          last_name: '',
          email: '',
          contact: '',
          additional_contact: '',
        },
        user_profile_photo: '',
        profile_photo: '',
        profile_photo_preview: '',
      }
    },
    computed:{
      ...mapGetters({
        isLoggedIn: 'auth/isLoggedIn',
        user: 'auth/getLoggedInUser'
      }),
    },
    created() {
      if(!this.isLoggedIn){
        this.$router.push('/')
      }
    },
    mounted() {
      this.profileData.first_name = this.user.first_name
      this.profileData.last_name = this.user.last_name
      this.profileData.email = this.user.email
      this.profileData.contact = this.user.contact
      this.profileData.additional_contact = this.user.additional_contact
      this.user_profile_photo = this.user.profile_photo
    },
    methods: {
      updateProfile(){
        this.isLoading = true
        this.$store.dispatch('auth/profileUpdate', this.profileData)
        .then((res) => {
          this.isLoading = false
          this.$store.commit('auth/SET_USER', res.data.user)
          this.$toast.success(res.message)
        })
        .catch((error) => {
          this.isLoading = true
          this.$toast.error(error.response.data.message)
        })
    },

    uploadProfileImg(){
      const profileData = new FormData()
      profileData.append('profile_photo', this.profile_photo)

      this.$store.dispatch('auth/profilePhotoUpdate', profileData)
      .then(res => {
        this.profileChange = false
        this.$toast.success(res.message)
        this.$store.commit('auth/SET_USER', res.data.user)
        this.profile_photo = ''
      })
      .catch(err => {
        this.$toast.error(err.response.data.message)
      })
    },

    displayProfilePhoto(event) {
      this.profileChange = true
      this.profile_photo_preview = URL.createObjectURL(event.target.files[0])
      this.profile_photo = event.target.files[0]
    },
    cancleImg() {
      this.profileChange = false
      this.profile_photo_preview = ''
    },
      
    },

}
</script>

<style scoped>
.changeBtn{
  padding: 3px 8px;
  background: #3b54ff;
  color: #fff;
  border-radius: 25px;
  cursor: pointer;
  font-size: 14px;
}
.cancleBtn{
  padding: 3px 8px;
  background: red;
  color: #fff;
  border-radius: 25px;
  cursor: pointer;
  font-size: 14px;
}
label,input{
  font-size: 18px;
}
.profile-image{
  width: 90px;
  height: 90px;
  border-radius: 50%;
  position: relative;
  margin: 8px auto 6px auto;
  background: #efef;
}
.profile-image img{
  width: 100%;
  height: 100%;
  border-radius: 50%;
}
.changes{
  position: absolute;
  bottom: 0;
  right: 0;
  width: 26px;
  height: 26px;
  background: #3B54FF;
  border: 1px solid #fff;
  color: #fff;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}
.change-password{
  font-size: 16px;
  color: #3B54FF;
  font-weight: bold;
  text-decoration: none;
  font-size: 18px;
}
.custom-btn{
  padding: 8px 46px;
  color: #fff;
  background: linear-gradient(98deg, #3B99FE 0%, #3b54ff 100%) 0% 0% no-repeat padding-box;
  border: none;
  border-radius: 4px;
  font-size: 18px;
}
</style>