<template>
  <div class="">
      <h3 class="font-20 bold">My Favorite List</h3>

      <div v-for="(favorite,index) in favorites" :key="favorite.id" class="favorite-item">
      <nuxt-link :to="'/service/'+favorite.rent.id">
        <div class="row">
          <div class="col-md-3">
            <div class="box-image">
              <img :src="favorite.rent.thumbnails[0].src" />
              <div class="overItem">
                <i class="fa-solid fa-image font-16"></i>
                <span class="font-18"> {{ favorite.rent.thumbnails.length-1}}</span>
              </div>
            </div>
          </div>
          <div class="col-md-9 ps-md-2">
            <div class="like">
              <p class="text-green m-0 font-18 bold">{{ symbol }}{{ favorite.rent.charges.rent_price }}/Month</p>
            </div>
            <p class="m-0 font-18 desc mt-lg-2">
                {{ favorite.rent.title }}
            </p>

            <div class="row rent mt-lg-3 mt-2">
              <div class="col-5 col-sm-4">
                <p class="font-14">Rent Type</p>
                <p class="font-14 text-gray">{{ favorite.rent.type }}</p>
              </div>
              <div class="col-7 col-sm-8">
                <p class="font-14">Rent From</p>
                <p class="font-14 text-gray">{{ favorite.rent.rent_info.available_from }}</p>
              </div>
            </div>
          </div>
        </div>
      </nuxt-link>
      <div class="favorite-icon" @click="removeFavorite(index,favorite.id)">
        <span class="heard-like"> <i class="fa-solid fa-heart"></i> </span>
      </div>
    </div>

    <div v-if="favorites == ''" class="mt-4">
       <div class="emply-message text-center">
          <h3>Oops!</h3>
          <p>Favotite list is empty</p>
       </div>
    </div>

  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    layout: 'dashboard',
    data() {
      return {
        favorites: null,
      }
    },
    mounted() {
      this.getFavoriteList()
    },
    computed:{
    ...mapGetters({
      symbol: 'currency/getSymbol',
      isLogging: 'auth/isLoggedIn'
    }),
    },
    created() {
      if (!this.isLogging) {
        this.$router.push('/login-signup')
      }
    },
    methods: {
      getFavoriteList(){
        this.$store.commit("loader/SET_Loader",true)
        this.$store.dispatch('favorite/favoriteList')
        .then(res=> {
          this.favorites = res.data.favorites
          this.$store.commit("loader/SET_Loader",false)
        })
      },
      removeFavorite(index,id){
        this.$store.commit("loader/SET_Loader",true)
        this.$store.dispatch('favorite/removeFavorite',id)
        .then(res=> {
          this.$toast.success(res.message)
          this.favorites.splice(index,1)
          this.$store.commit("loader/SET_Loader",false)
        })

      }
    },

}
</script>

<style scoped>
.heard-like {
  color: #dc3545;
  font-size: 21px;
}
a {
  text-decoration: none;
  color: black;
}
.favorite-item {
  padding: 12px 0;
  border-bottom: 1px solid #ddd;
  position: relative;
}
.favorite-icon{
  position: absolute;
  top: 12px;
  right: 0px;
  width: 30px;
  height: 30px;
  display: flex;
  justify-content: center;
  border-radius: 50%;
  cursor: pointer;
}
.box-image {
  position: relative;
  height: 110px;
}
.box-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.overItem {
  position: absolute;
  bottom: 4px;
  left: 6px;
  background: #ffffff;
  padding: 0 6px;
  border-radius: 2px;
}
.overItem span {
  line-height: 12px;
}
.desc {
  line-height: 20px;
}
.border {
  border-top: 1px solid #ddd !important;
  margin: 12px 0;
}
</style>
