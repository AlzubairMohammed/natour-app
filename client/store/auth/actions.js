export default {
  register(context, data) {
    return this.$axios.$post("/signup", data);
  },
  login(context, data) {
    return this.$axios.$post("/login", data);
  },

  logout(context, payload) {
    return this.$axios.$post(`/logout`, payload, {
      headers: {
        Authorization: context.rootState.auth.token,
      },
    });
  },

  verifyOtp(context, data) {
    return this.$axios.$post("/contact-verify", data, {
      headers: {
        Authorization: context.rootState.auth.token,
      },
    });
  },

  reSendOtp(context, contact) {
    return this.$axios.$post("/resend-otp", `contact=${contact}`);
  },

  recoveryPassword(context, payload) {
    return this.$axios.$post("/forgot-password", payload);
  },

  forgotPasswordOTPVerify(context, payload) {
    return this.$axios.$post("/forgot-password/otp/verify", payload);
  },

  resetPassword(context, payload) {
    return this.$axios.$post("/reset-password", payload);
  },

  profileUpdate(context, payload) {
    return this.$axios.$post("/update-profile", payload);
  },

  changePassword(context, payload) {
    return this.$axios.$post("/change-password", payload, {
      headers: {
        Authorization: context.rootState.auth.token,
      },
    });
  },

  profilePhotoUpdate(context, payload) {
    return this.$axios.$post("/update-photo", payload, {
      headers: {
        Authorization: context.rootState.auth.token,
      },
    });
  },
};
