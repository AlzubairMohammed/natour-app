<template>
  <div class="bg-color">
    <div class="banner">
      <div class="sticky-top pb-120">
        <NavbarHome/>
      </div>
    </div>

    <div class="about-content">
      <div class="container">
        <h3 class="title">About us</h3>
        <div class="card card-body border-0 rounded-0">
          <p class="font-16 text-gray">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
          </p>
        </div>
      </div>
    </div>

    <div class="section container py-5">
      <div class="row">
        <div class="col-lg-6 my-2">
          <div class="row">
            <div class="col-2">
              <img src="/images/About-us-page/goal.png" alt="" class="about-icon">
            </div>
            <div class="col-10">
              <h3 class="font-20 bold pb-2">Our mission</h3>
              <p class="text-gray content">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 my-2">
          <div class="row">
            <div class="col-2">
              <img src="/images/About-us-page/visionary.png" alt="" class="about-icon">
            </div>
            <div class="col-10">
              <h3 class="font-20 bold pb-2">Our vision</h3>
              <p class="text-gray content">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-white">
      <Footer />
    </div>
  </div>
</template>

<script>
export default {
  layout: 'home'

}
</script>

<style scoped>
.banner{
width: 100%;
height: 342px;
background: linear-gradient(to right, rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('/images/About-us-page/bout-us.jpg');
background-size: auto,cover;
background-position:center center;
background-repeat: no-repeat;
}
.about-content{
  margin-top: -120px;
}
.title{
  font-size: 30px;
  color: #fff;
  padding-bottom: 8px;
}
.content{
  border-bottom: 1px solid #3B54FF;
  padding-bottom: 8px;
}
.about-icon{
  width: 70px !important;
}
.pb-120{
  padding-bottom: 120px;
}

@media screen and (max-width: 1024px){
 .about-content{
  margin-top: -138px;
}
}
@media screen and (max-width: 991px){
 .about-content{
  margin-top: -142px;
}
}
@media screen and (max-width: 768px){
 .about-content{
  margin-top: -160px;
}
}
@media screen and (max-width: 425px){
 .about-content{
  margin-top: -200px;
}
}
</style>
