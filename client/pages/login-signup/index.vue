<template>
  <div class="body">
    <div class="body-content">
      <div class="header">
        <nuxt-link to="/"><img src="/images/logo.svg" /></nuxt-link>
      </div>
      <div class="main-content">
        <b-tabs content-class="mt-3" v-model="tabIndex">
          <b-tab title="Login">
            <Login/>
            <div class="text-center mt-2 footer-text">
                <span class="text-gray">Don't have an account?</span>
                <a href="javascript:void(0)" @click="tabIndex++">Create account</a>
            </div>
          </b-tab>
          <b-tab title="Sign up">
            <Signup/>
            <div class="text-center footer-text mt-2">
                <span class="text-gray">Already have an account?</span>
                <a href="javascript:void(0)" @click="tabIndex--">Sign in</a>
            </div>
          </b-tab>
        </b-tabs>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  layout: "blank",
  data() {
    return {
      tabIndex: 0
    }
  },
};
</script>

<style scoped>

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
