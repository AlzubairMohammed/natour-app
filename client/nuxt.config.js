export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: "natour",
    htmlAttrs: {
      lang: "en",
    },
    target: "static",
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      { hid: "description", name: "description", content: "" },
      { name: "format-detection", content: "telephone=no" },
    ],
    link: [
      { rel: "icon", type: "image/x-icon", href: "/favicon.png" },
      { rel: "stylesheet", href: "/css/bootstrap.min.css" },
      { rel: "stylesheet", href: "/css/owl.carousel.min.css" },
    ],
    script: [{ src: "/js/bootstrap.bundle.min.js" }, { src: "/js/all.js" }],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: ["~/asset/css/style.css"],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    "~/plugins/axios.js",
    { src: "~/plugins/vuex-persistedstate.js", ssr: false },
    "~/plugins/global-component-register.js",
    "~/plugins/moment-timezone-inject.js",
    "~/plugins/helpers.js",
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: ["@nuxtjs/moment"],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/bootstrap
    "bootstrap-vue/nuxt",
    // https://go.nuxtjs.dev/axios
    "@nuxtjs/axios",
    "@nuxtjs/toast",
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    baseURL: process.env.BASE_URL,
  },

  // @nuxtjs/toast
  toast: {
    position: "bottom-right", // message will display at the bottom right corner of the screen
    duration: 5000, // display message for five second
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {},
  generate: {
    routes: [
      "/",
      "/about-us",
      "/add-post",
      "/change-password",
      "contact-us",
      "create-password",
      "/favorite",
      "/finish-post",
      "/login-signup",
      "/my-ads",
      "/otp-verify",
      // "service-id",
      "/my-ads/:id?",
      "/service",
      "/recover-otp-verify",
      "/profile",
      "/password-reset",
    ],
  },
  // router: {
  //   base: "/app/",
  // },
};
