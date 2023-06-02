<template>
  <div class="body">
      <div class="container">
          <div class="card card-body content">
              <img src="/images/Congratulations.svg">
              <h3 class="font-24 bold mt-2 mb-0">Congratulations</h3>
              <p class="text-gray m-0">You have successfully posted your Ad</p>
              <button class="btn btn-primary button mt-2" @click="showPost">Great</button>
          </div>
      </div>
      
  </div>
</template>

<script>
export default {
    methods: {
        showPost(){
            this.$router.push('/my-ads')
        }
    },
}
</script>

<style scoped>
.body{
    background: #F7F9FA;
    padding: 20px 0;
}
.content{
    width: 100%;
    min-height: 80vh;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.button{
    width: 200px;
}
</style>