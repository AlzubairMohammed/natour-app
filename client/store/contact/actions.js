export default {
  message(context, data) {
    return this.$axios.$post("/message",data);
  },

};
