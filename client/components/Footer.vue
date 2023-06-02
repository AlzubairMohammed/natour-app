<template>
<footer>
      <div class="footer py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-12 mt-3">
              <img src="/images/logo.svg" alt="Logo" height="34">
              <p class="text font-14 mt-3">
                In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.
              </p>
              <!-- copyright -->
              <p class="pt-3 font-12 text-gray">	&copy; HouseRent. All rights reserved {{ copyright_year }}</p>
            </div>

            <div class="col-md-3 col-sm-12 mt-3">
              <h5 class="footerLink">Quick Link</h5>
              <div class="divder mb-3"></div>
              <ul>
              <li><nuxt-link to="/about-us" class="link">About Us</nuxt-link></li>
              <li><nuxt-link to="/#how-it-works" class="link">How it works</nuxt-link></li>
              <li><nuxt-link to="/contact-us" class="link">Contact Us</nuxt-link></li>
              </ul>
            </div>

            <div class="col-md-3 col-sm-12 mt-3">
              <h5 class="footerLink">Connect With Us</h5>
              <div class="divder mb-3"></div>
              <div class="social text-center-sm">
                <a v-for="socialLink in socialLinks" :key="socialLink.id" :href="socialLink.link" class="social-link" :target="socialLink.target"> <i :class="'fa-brands '+socialLink.icon"></i> </a>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div v-if="showLoader" class="content_loader">
        <img src="/loader/loader.gif">
      </div>

    </footer>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
data() {
  return {
    copyright_year: new Date().getFullYear(),
    socialLinks: '',
  }
},
computed: {
    ...mapGetters({
      showLoader: 'loader/getLoader',
    })
  },
  mounted() {
    this.getSocialLink()
  },
  methods: {
    getSocialLink(){
      this.$store.dispatch('social/socialLink').then(res=>{
        this.socialLinks = res.data.social
      })
    },
  },
}
</script>

<style>

.content_loader{
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  background: #00000015;
}

.divder{
  border-bottom: 2px solid #ccc;
  width: 160px;
  position: relative;
  margin-bottom: 16px;
}
.divder::before{
  position: absolute;
  content: '';
  width: 70px;
  height: 4px;
  background: #513AFF;
  top:-1px;
  left: -1px;
}
.footer ul{
  margin: 0; padding: 0;
}
.footer ul li{
  list-style: none;
}
.footer ul li .link{
  text-decoration: none;
  color: #000;
  line-height: 20px;
  margin-bottom: 6x;
  font-size: 14px;
  color: #000;
  display:inline-block;
}

.social-link{
  width: 32px;
  height: 32px;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  border: 1px solid #FFFFFF;
  background-color: #FFFFFF;
  color: #B4B4B4;
  font-size: 16px;
  border-radius: 50%;
  margin: 4px;
  cursor: pointer;
  transition: .3s;
}
.social-link:hover{
  background: #513AFF;
  color: #fff;
  border-color: #513AFF;
  transform: scale(1.05);
}
.font-12{
  font-size: 12px;
}
@media screen and (max-width: 992px){
  .footerLink{
    font-size: 18px;
  }
}
</style>
