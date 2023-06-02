export default{
    favoriteList(context,data){
      return  this.$axios.$get('/favorites',{
        headers: {
          Authorization: context.rootState.auth.token,
        },
      });
    },

    removeFavorite(context,id){
      return  this.$axios.$delete('/favorites/'+id,{
        headers: {
          Authorization: context.rootState.auth.token,
        },
      });
    },

    addFavorites(context,data){
      return  this.$axios.$post('/favorites',data,{
        headers: {
          Authorization: context.rootState.auth.token,
        },
      });
    }

}
