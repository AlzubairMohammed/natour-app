export default {
  isLoggedIn(state) {
    if (state.user == null) {
      return false;
    } else {
      return true;
    }
  },
  getLoggedInUser(state) {
    return state.user;
  },
  getToken(state) {
    return state.token;
  },
  getContact(state) {
    return state.contact;
  },
  getRestPasswordToken(state) {
    return state.resetPasswordToken;
  },
};
