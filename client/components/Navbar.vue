<template>
  <client-only>
      <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-white">
        <div class="container-fluid">
          <nuxt-link class="navbar-brand" to="/">
            <img src="/images/logo.svg" alt="logo" height="34" />
          </nuxt-link>
          <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item active">
                <nuxt-link class="nav-link" to="/">HOME </nuxt-link>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dropdownId"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >SERVICE</a
                >
                <div class="dropdown-menu end-0" aria-labelledby="dropdownId">
                  <nuxt-link class="dropdown-item" to="/service">All Ads</nuxt-link>
                  <nuxt-link class="dropdown-item" to="/add-post">Post a Ads</nuxt-link>
                </div>
              </li>
              <li class="nav-item">
                <nuxt-link class="nav-link" to="/about-us">ABOUT US</nuxt-link>
              </li>
              <li class="nav-item">
                <nuxt-link class="nav-link" to="/contact-us">CONTACT US</nuxt-link>
              </li>
            </ul>
            <ul v-if="isAuthenticated" class="navbar-nav">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dropdownId"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <img
                    height="40px"
                    width="40"
                    :src="user.profile_photo"
                    alt="user"
                    class="profile_photo"
                  />
                  <span class="ms-1">{{ user.name }}</span>
                </a>
                <div class="dropdown-menu end-0" aria-labelledby="dropdownId">
                  <nuxt-link class="dropdown-item" to="/profile">Profile</nuxt-link>
                  <a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li v-if="!isAuthenticated" class="nav-item">
                <nuxt-link class="nav-link" to="/login-signup">LOG IN</nuxt-link>
              </li>
              <li class="nav-item">
                <span class="nav-link btn-primary text-white" style="cursor: pointer;" @click="showAddPost()">Add a Post</span>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  </client-only>
</template>

<script>
import { mapGetters } from "vuex";
export default{
data() {
  return {

  }
},
computed:mapGetters({
  user: 'auth/getLoggedInUser',
  isAuthenticated: 'auth/isLoggedIn',
}),
methods: {
  showAddPost(){
      this.$router.push('/add-post')
  },

  logout(){
      this.$store.dispatch('auth/logout')
      .then(res => {
        this.$toast.success(res.message)
        this.$store.commit('auth/SET_USER', null)
        this.$store.commit('auth/SET_ACCESS_TOKEN', null)
        this.$store.commit('auth/SET_CONTACT', null)
        this.$router.push('/')
      })
      .catch(err => {
        this.$toast.error(err.response.data.message)
        this.$store.commit('auth/SET_USER', null)
        this.$store.commit('auth/SET_ACCESS_TOKEN', null)
        this.$store.commit('auth/SET_CONTACT', null)
        this.$router.push('/')
      })
    },
},
}
</script>

<style scoped>
.navbar{
      border-bottom: 1px solid #eee;
}
.navbar-light .navbar-nav .nav-link {
  color:#000;
  font-size: 18px;
  font-weight: normal;
  padding: 8px 20px;
}
.NavbarMain{
  background: #fff !important;
}
.profile_photo{
  border-radius: 50%;
}
@media screen and (max-width: 768px) {

}
</style>
