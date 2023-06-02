<template>
    <div>
        <form @submit.prevent="signup">
            <label class="font-18 mb-1">Enter your Phone</label>
            <div class="input-group">
                <!-- <button class="flag" type="button">
                    <img src="/images/us-flag.webp"> +1
                </button> -->
                <input type="number" v-model="form.contact" class="form-control font-18" placeholder="Enter Phone Number" :class="{ 'is-invalid' : errors.contact }">
            </div>
            <small v-if="errors.contact" class="text-danger d-block">{{errors.contact[0]}}</small>

            <label class="form-label mb-0 mt-2 font-18">Name</label>
            <div class="">
            <input type="text" v-model="form.first_name" placeholder="Enter Name" class="form-control font-18" :class="{ 'is-invalid' : errors[0] }">
            </div>
            <small v-if="errors[0]" class="text-danger d-block">{{errors[0].first_name}}</small>

            <label class="form-label mb-1 mt-2 font-18">Create Password</label>
            <div class="mb-0 input">
            <input :type="showPassword ? 'text' : 'password'" v-model="form.password" placeholder="Password" class="form-control font-18" :class="{ 'is-invalid' : errors.password }">
                <button class="button" type="button" @click="toggleShow">
                <span class="icon ">
                    <img :src="showPassword ? '/images/eye.png' : '/images/hidden.png' "/>
                </span>
            </button>
            </div>
            <small v-if="errors.password" class="text-danger d-block">{{errors.password[0]}}</small>

            <label class="form-label mb-1 mt-2 font-18">Confirm Password</label>
            <div class="mb-0 input">
            <input :type="showConfirmPassword ? 'text' : 'password'" v-model="form.password_confirmation" placeholder="Confirm Password" class="form-control font-18" :class="{ 'is-invalid' : errors.password_confirmation }">
                <button class="button" type="button" @click="toggleConfirmPassword">
                <span class="icon ">
                    <img :src="showConfirmPassword ? '/images/eye.png' : '/images/hidden.png'"/>
                </span>
            </button>
            </div>
             <small v-if="errors.password_confirmation" class="text-danger d-block">{{errors.password_confirmation[0]}}</small>

            <div class="mt-3">
                <button v-if="isLoading" class="btn bg-custom w-100 py-1" type="button"><b-spinner variant="white" label="Spinning"></b-spinner></button>
                <button v-else class="btn bg-custom w-100 py-2" type="submit">Register</button>
            </div>

        </form>
    </div>
</template>

<script>
export default {
    data() {
      return {
        isLoading: false,
        showPassword: false,
        showConfirmPassword: false,
        form: {
            first_name: '',
            contact: '',
            password: '',
            password_confirmation: '',
        },
        errors: [],

      }
    },
    methods: {
        signup(){
          if (!this.form.first_name) {
            this.errors.push({first_name : 'The Name field is required.'});
            return false
          }
            this.isLoading = true
            this.$store.dispatch('auth/register', this.form)
            .then( res=> {
                this.isLoading = false
                this.$store.commit('auth/SET_USER', res.data.user)
                this.$store.commit('auth/SET_ACCESS_TOKEN', res.data.access)
                this.$store.commit('auth/SET_CONTACT', res.data.user.contact)

                this.$toast.success(res.message)
                this.form = []
                this.errors = ''
                this.$router.push('/otp-verify')
            })
            .catch(err => {
                this.isLoading = false
                this.errors = err.response.data.errors
            })
        },

        toggleShow(){
            this.showPassword = !this.showPassword
        },
        toggleConfirmPassword(){
            this.showConfirmPassword = !this.showConfirmPassword
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
