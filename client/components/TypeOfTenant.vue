<template>
  <div class="type-of-tenant py-5">
    <div class="container">
      <h1 class="title">Type of Tenant</h1>
      <p class="short-desc">Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document.</p>

      <div class="type-section text-center mt-4">

        <div class="tenant-item">
          <img src="/images/Type-of-Tenant-icon/Male Student.svg">
          <p class="name">Male Student</p>
        </div>

        <div class="tenant-item">
          <img src="/images/Type-of-Tenant-icon/Female Student.svg">
          <p class="name">Female Student</p>
        </div>

        <div class="tenant-item">
          <img src="/images/Type-of-Tenant-icon/Man Job Holder.svg">
          <p class="name">Man Job Holder</p>
        </div>

        <div class="tenant-item">
          <img src="/images/Type-of-Tenant-icon/Women Job Holder.svg">
          <p class="name">Women Job Holder</p>
        </div>

        <div class="tenant-item">
          <img src="/images/Type-of-Tenant-icon/Small Family.svg">
          <p class="name">Small Family</p>
        </div>

        <div class="tenant-item">
          <img src="/images/Type-of-Tenant-icon/Family.svg">
          <p class="name">Family</p>
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
.type-section{
  display: block;
  overflow: hidden;
}
.tenant-item{
  width: 162px;
  height: 162px;
  border: 1px solid #F0F4F8;
  border-radius: 10px;
  float: left;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin-right: 16px;
  margin-bottom: 16px;
}
.tenant-item:first-child{
  margin-left: 0;
}
.tenant-item:last-child{
  margin-right: 0;
}
.tenant-item img{
  height: 65px;
}
.tenant-item .name{
  margin-top: 8px;
  font-size: 16px;
  font-weight: 500;
}

@media screen and (max-width: 768px) {
  .tenant-item{
  width: 146px;
  height: 146px;
  }
}
@media screen and (max-width: 600px) {
  .tenant-item{
  width: 152px;
  height: 152px;
  }
}
@media screen and (max-width: 365px) {
  .tenant-item{
  width: 100%;
  height: 165px;
  }
}
</style>
