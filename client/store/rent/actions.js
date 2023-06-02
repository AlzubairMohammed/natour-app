export default {
  rentDetails(context, id) {
    return this.$axios.$get("/rents/" + id);
  },

  myPost(context, data) {
    return this.$axios.$get("/my-posts", {
      headers: {
        Authorization: context.rootState.auth.token,
      },
    });
  },

  getAllRents(context, data){
    return this.$axios.$get(`/rents?${data}`);
  },

  rentType(context){
    return this.$axios.$get("/rent-type");
  },
  getCity(context){
    return this.$axios.$get("/city")
  },
  getArea(context, data){
    return this.$axios.$post("/area",data)
  },

  createNewPost(context,payload){
    return this.$axios.$post("/post", payload,{
      headers: {
        Authorization: context.rootState.auth.token,
      },
    });
  },

  updatePost(context, [payload, id]){
    return this.$axios.$post(`/post/${id}`, payload,{
      headers: {
        Authorization: context.rootState.auth.token,
      },
    });
  },

  deletePost(context, id){
    return this.$axios.$delete(`/my-posts/${id}`,{
      headers: {
        Authorization: context.rootState.auth.token,
      },
    });
  },

};
