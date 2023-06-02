<template>
  <div class="popular-city bg-color py-5">
    <div class="container">
      <h1 class="title"> Popular Cities</h1>
      <p class="short-desc">
        Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document.
      </p>
      <div class="cities-item mt-3">
        <div class="row">
          <div class="col-md-8 mt-4">
            <div class="city">
              <img src="/images/Popular-Cities-img/Kuala Lumpur.jpg" width="100%">
              <div class="city-content">
                <p class="ctitle">Kuala Lumpur</p>
                <p class="cpost">20 Posts</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mt-4">
            <div class="city">
              <img src="/images/Popular-Cities-img/Seberang Perai.jpg" width="100%">
              <div class="city-content">
                <p class="ctitle">Seberang Perai</p>
                <p class="cpost">20 Posts</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mt-4">
            <div class="city">
              <img src="/images/Popular-Cities-img/Subang Jaya.jpg" width="100%">
              <div class="city-content">
                <p class="ctitle">Subang Jaya</p>
                <p class="cpost">20 Posts</p>
              </div>
            </div>
          </div>
          <div class="col-md-8 mt-4">
            <div class="city">
              <img src="/images/Popular-Cities-img/George-Town.jpg" width="100%">
              <div class="city-content">
                <p class="ctitle">George Town</p>
                <p class="cpost">20 Posts</p>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.city{
  position: relative;
}
.city-content{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.2);
  color: #fff;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: flex-end;
  align-items:  center;
}
.cpost{
  margin-bottom: 18px;
  font-size: 16px;
  color: #FFFFFF;
}
.ctitle{
  font-size: 26px;
}
</style>
