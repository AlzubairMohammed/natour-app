<template>
    <div>
        <form @submit.prevent="loginFormSubmit">
            <label class="font-18 mb-1">Enter your Phone</label>
            <div class="input-group">
                <!-- <button class="flag" type="button">
                    <img src="/images/us-flag.webp"> +1
                </button> -->
                <input type="text" class="form-control font-18" v-model="form.contact" placeholder="Phone Number" :class="{  'is-invalid' : errors.contact || invalid }">
            </div>
            <small v-if="errors.contact" class="text-danger d-block">{{errors.contact[0]}}</small>

            <label class="form-label mb-1 font-18 mt-2">Enter your Password</label>
            <div class="input">
            <input :type="showPassword ? 'text' : 'password' " placeholder="Enter Password" v-model="form.password" class="form-control font-18" :class="{ 'is-invalid' : errors.password || invalid }">
                <button class="button" type="button" @click="toggleShow">
                <span class="icon ">
                    <img :src="showPassword ? '/images/eye.png' : '/images/hidden.png' "/>
                </span>
            </button>
            </div>
            <small v-if="errors.password" class="text-danger d-block">{{errors.password[0]}}</small>

            <div class="d-flex justify-content-end pt-2">
                <nuxt-link to="/password-reset" class="font-16 text-gray text-decoration-none">Forgot password?</nuxt-link>
            </div>

            <div class="mt-3">
                <button v-if="isLoading" class="btn bg-custom w-100 py-1" type="button"><b-spinner variant="white" label="Spinning"></b-spinner></button>
                <button v-else class="btn bg-custom w-100 py-2" type="submit">Sign in</button>
            </div>

        </form>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    data() {
      return {
        form:{
          contact: '',
          password: ''
        },
        isLoading: false,
        showPassword: false,
        errors: [],
        invalid: false,
      }
    },
    computed: {
        ...mapGetters({
            user: 'auth/isLoggedIn'
        }),
    },
    methods: {
      toggleShow(){
        this.showPassword = !this.showPassword
      },
      loginFormSubmit(){
        this.isLoading = true
        this.$store.dispatch('auth/login', this.form)
      .then(res => {
        this.isLoading =false
        this.$toast.success(res.message)
        this.$store.commit('auth/SET_USER', res.data.user)
        this.$store.commit('auth/SET_ACCESS_TOKEN', res.data.access)
        this.$store.commit('auth/SET_CONTACT', res.data.user.contact)
        this.$router.push('/')
      })
      .catch(err => {
        this.invalid = true
        this.isLoading =false
        this.errors.contact = null
        this.errors.password = null
        this.$toast.error(err.response.data.message)
        if (err.response.data.errors) {
            this.errors = err.response.data.errors
        }
      })
      }
    },
}
</script>

<style scoped>
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
    .icon>img{
        width: 24px;
    }
    @media screen and (max-width: 425px) {
        .footer-text{
            font-size: 14px !important;
        }
    }
</style>
