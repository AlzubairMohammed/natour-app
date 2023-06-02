<template>
  <div class="">
      <h3 class="font-20 bold">My Ads</h3>

      <div v-for="myPost in myPosts" :key="myPost.id" class="favorite-item">
        <div class="row">
          <div class="col-md-3">
            <div class="box-image">
              <img :src="myPost.thumbnails[0] ? myPost.thumbnails[0].src : ''"/>
              <div class="overItem">
                <i class="fa-solid fa-image font-16"></i>
                <span class="font-18"> {{ myPost.thumbnails[0] ? myPost.thumbnails.length-1 : '0'}} </span>
              </div>
            </div>
          </div>
          <div class="col-md-9 ps-md-2">
            <div class="like d-flex justify-content-between">
                <div>
                  <nuxt-link :to="'/service/'+myPost.id">
                    <p class="text-green m-0 font-18 bold">{{symbol}}{{myPost.charges.rent_price}}/Month</p>
                    </nuxt-link>
                </div>
                  <div class="action-btn">
                      <nuxt-link :to="`/my-ads/${myPost.id}`" class="edit"> <i class="fa fa-edit"></i> Edit</nuxt-link>
                      <button class="delete" @click="showDeleteModal(myPost.id)"> <i class="fa fa-trash"></i> Delete</button>
                  </div>
            </div>
            <nuxt-link :to="'/service/'+myPost.id">
            <p class="m-0 font-18 desc mt-lg-2">
                {{myPost.title}}
            </p>

            <div class="row rent mt-lg-3 mt-2">
              <div class="col-5 col-sm-4">
                <p class="font-14">Rent Type</p>
                <p class="font-14 text-gray">{{myPost.type}}</p>
              </div>
              <div class="col-7 col-sm-8">
                <p class="font-14">Rent From</p>
                <p class="font-14 text-gray">{{ myPost.rent_info ? myPost.rent_info.available_from : 'Null' }}</p>
              </div>
            </div>
            </nuxt-link>
          </div>
        </div>
    </div>

    <div v-if="myPosts == ''" class="mt-4">
       <div class="emply-message text-center">
          <h3>Oops!</h3>
          <p>Posts list is empty</p>
       </div>
    </div>

    <b-modal id="delete-confirm" size="md" centered hide-header hide-footer>
      <h3 class="font-18">Select a reason to delete the Ads</h3>
      <select name="" class="form-select">
          <option value="">The house is Rented</option>
          <option value="">Others</option>
      </select>

      <div class="d-flex justify-content-end mt-5">
          <button class="btn cancle rounded-0" @click="hideModal">Cancle</button>
          <button class="btn btn-danger rounded-0" @click="deleteRent()">Delete Ads</button>
      </div>
    </b-modal>

  </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    layout: 'dashboard',
    data() {
      return {
        myPosts: [],
        delete_id : '',
      }
    },
    mounted() {
      this.getMyPost()
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
    getMyPost(){
      this.$store.commit("loader/SET_Loader",true)
      this.$store.dispatch('rent/myPost')
      .then(res=> {
        this.myPosts = res.data.posts
        this.$store.commit("loader/SET_Loader",false)
      })
      .catch(err=>{
        this.$store.commit("loader/SET_Loader",false)
        console.log(err);
      })
    },

    showDeleteModal(id){
      this.delete_id = id
      this.$bvModal.show('delete-confirm')
    },
    hideModal(){
      this.delete_id = ''
      this.$bvModal.hide('delete-confirm')
    },

    deleteRent(){
      this.$bvModal.hide('delete-confirm')
      this.$store.commit("loader/SET_Loader",true)
      this.$store.dispatch('rent/deletePost',this.delete_id)
      .then(res=> {
        this.getMyPost()
        this.delete_id = ''
        this.$toast.success(res.message)
        this.$store.commit("loader/SET_Loader",false)
      })
      .catch(err=>{
        this.delete_id = ''
        this.$store.commit("loader/SET_Loader",false)
        this.$toast.error(err.response.data.message)
        console.log(err);
      })
    },
  }
}
</script>

<style scoped>
.edit{
    font-size: 14px;
    color: #3B54FF;
    margin: 0 8px;
}
.delete{
    font-size: 14px;
    border: none;
    background: transparent;
    color: #FF0C0C;
}
a {
  text-decoration: none;
  color: black;
}
.favorite-item {
  padding: 12px 0;
  border-bottom: 1px solid #ddd;
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

.btn{
    width: 110px !important;
}
.cancle{
    background-color: #F5F5F5;
    margin-right: 10px;
    color: #808080;
}
</style>
