<template>
<div>
  <WelcomeSection/>
  <RecentPost/>
  <HowSearch/>
  <PopularCity/>
  <TypeOfTenant/>
  <div class="bg-color">
    <Footer/>
  </div>
</div>
</template>

<script>

export default {
  layout: 'home',
  data() {
    return {
      
    }
  },
  mounted() {
    this.setCurrenct();
  },
  methods: {
    setCurrenct(){
      this.$store.dispatch('currency/currencySymbol')
      .then(res => {
        this.$store.commit('currency/SET_CURRENCY', res.data.currency)
      })
      .catch(err=>{
        console.log(err.response.data);
      })
    }
  },
}
</script>
