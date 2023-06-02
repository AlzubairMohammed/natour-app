export default {
  socialLink(context) {
    return this.$axios.$get("/social-link");
  },

};
        