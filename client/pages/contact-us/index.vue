<template>
  <div class="bg-color">
    <div class="banner">
      <div class="sticky-top pb-65">
        <NavbarHome />
      </div>
    </div>

    <div class="content pb-5">
      <div class="container bg-white">
        <div class="row">
          <div class="col-lg-9 p-0">
            <div class="message-box">
              <form @submit.prevent="sendMessage">
                <div class="title d-flex justify-content-between">
                  <p class="bold font-24">Send us a Message</p>
                  <img src="/images/Contact-us-page/message-send.svg" />
                </div>

                <div class="row">
                  <div class="col-md-6 my-2">
                    <label class="form-label mb-1">Your Name</label>
                    <input
                      v-model="form.name"
                      type="text"
                      placeholder="Enter Your Name"
                      class="form-control"
                      :class="{  'is-invalid' : errors.name }"
                    />
                    <small v-if="errors.name" class="text-danger">{{errors.name[0]}}</small>
                  </div>

                  <div class="col-md-6 my-2">
                    <label class="form-label mb-1">Your Email</label>
                    <input
                    v-model="form.email"
                      type="text"
                      placeholder="Enter Your Email"
                      class="form-control"
                      :class="{  'is-invalid' : errors.email }"
                    />
                    <small v-if="errors.email" class="text-danger">{{errors.email[0]}}</small>
                  </div>

                  <div class="col-md-6 my-2">
                    <label class="form-label mb-1">Phone Number</label>
                    <input
                    v-model="form.contact"
                      type="text"
                      placeholder="Enter Phone Number"
                      class="form-control"
                      :class="{  'is-invalid' : errors.contact }"
                    />
                    <small v-if="errors.contact" class="text-danger">{{errors.contact[0]}}</small>
                  </div>

                  <div class="col-md-6 my-2">
                    <label class="form-label mb-1">Occupation</label>
                    <input
                    v-model="form.occupation"
                      type="text"
                      placeholder="Enter Your Email"
                      class="form-control"
                      :class="{  'is-invalid' : errors.occupation }"
                    />
                    <small v-if="errors.occupation" class="text-danger">{{errors.occupation[0]}}</small>
                  </div>
                  <div class="col-12 my-2">
                    <textarea
                      v-model="form.message"
                      class="form-control bg-color"
                      rows="5"
                      placeholder="Write your message"
                      :class="{  'is-invalid' : errors.message }"
                    ></textarea>
                    <small v-if="errors.message" class="text-danger">{{errors.message[0]}}</small>
                  </div>
                </div>
                <div class="send-btn d-flex justify-content-end mt-2">
                  <button v-if="!process" type="submit" class="btn btn-primary">
                    Send Message
                  </button>
                  <button v-else type="button" disabled class="btn btn-primary">
                    <b-spinner variant="white" small label="Spinning"></b-spinner> Sending
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-3 p-0">
            <div class="side-content p-3">
                <div class="location text-center">
                    <img src="/images/Contact-us-page/location.svg" class="pb-1" />
                    <p class="font-14">
                    Cemex Anha Palace
                    Flat#-5th(A), H# 19, Road# 08,
                    Shekhertek Adabor Thana Mohammedpur
                    Dhaka -1207, Bangladesh.
                    </p>
                </div>
                <div class="phone text-center">
                    <img src="/images/Contact-us-page/phone.svg" class="pb-1" />
                    <p class="font-14">
                    +88 01963953998
                    </p>
                </div>
                <div class="message text-center">
                    <img src="/images/Contact-us-page/mail.svg" class="pb-1" />
                    <p class="font-14">
                    <a href="mailto:razinsoftbd@gmail.com" class="text-black">razinsoftbd@gmail.com</a>
                    </p>
                </div>
                <div class="social">
                  <a v-for="socialLink in socialLinks" :key="socialLink.id" :href="socialLink.link" class="icon" :target="socialLink.target"> <i :class="'fa-brands '+socialLink.icon"></i> </a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white">
      <Footer />
    </div>
  </div>
</template>

<script>
export default {
  layout: "home",
  data() {
    return {
      form: {
        name: '',
        email: '',
        contact: '',
        occupation: '',
        message: ''
      },
      errors: '',
      process: false,
      socialLinks: '',
    }
  },
  mounted() {
    this.getSocialLink()
  },
  methods: {
    sendMessage(){
      this.process = true
      this.$store.dispatch("contact/message",this.form).then(res=>{
        this.process = false
        this.$toast.success(res.message)
        this.form.name = ''
        this.form.email = ''
        this.form.contact = ''
        this.form.occupation = ''
        this.form.message = ''
      }).catch(err=>{
        this.process = false
        this.errors = err.response.data.errors
      })
    },
    getSocialLink(){
    this.$store.dispatch('social/socialLink').then(res=>{
      this.socialLinks = res.data.social
    })
  },
  },
};
</script>

<style scoped>
.banner {
  width: 100%;
  height: 342px;
  background: linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
    url("/images/Contact-us-page/contact-us.jpg");
  background-size: auto, cover;
  background-position: center center;
  background-repeat: no-repeat;
}
.content {
  margin-top: -60px;
}

.message-box {
  padding: 16px;
  border-right: 1px solid #ddd;
  box-sizing: border-box;
}

.location,.phone{
  border-bottom: 1px solid #ddd;
}
.location,.phone,.message{
  padding: 16px 0;
}
.social .icon{
  display: inline-flex;
  width: 30px !important;
  height: 30px;
  border-radius: 50%;
  justify-content: center;
  align-items: center;
  margin: 2px;
  color: #BFBFBF;
  transition: 0.5s;
}
.social .icon:hover{
  background-color:#3B54FF;
  color: #fff;
}
.side-content{
  position: relative;
  text-align: center;
}

@media screen and (min-width: 992px){
 .social{
  margin-top: 100px;
}
}
@media screen and (min-width: 1200px){
 .social{
  margin-top: 120px;
}
}
</style>
