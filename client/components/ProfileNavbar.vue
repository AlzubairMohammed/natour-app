<template>
  <div class="card border-0 rounded-0  profileNavbar">
      <ul>
          <li>
              <nuxt-link to="/profile" class="link active"> <i class="fa-solid fa-user icon"></i> My profile </nuxt-link>
          </li>
          <li>
              <nuxt-link to="/favorite" class="link"> <i class="fa-solid fa-heart icon"></i> Favorite </nuxt-link>
          </li>
          <li>
              <nuxt-link to="/my-ads" class="link"> <i class="fa-solid fa-bullhorn icon"></i> My Ads </nuxt-link>
          </li>
      </ul>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
    .profileNavbar{
        padding-top: 60px;
        height: 100%;
    }
    .profileNavbar ul{
        padding: 0;
        margin: 0;
    }
    .profileNavbar ul li{
        list-style: none;
    }
    .profileNavbar ul li .link{
        font-size: 18px;
        color: #808080;
        padding: 8px 20px;
        display: block;
        text-decoration: none;
    }
    .nuxt-link-active{
        border-left: 3px solid #3B54FF;
        background: #F6F7FF;
        color: #3B54FF !important;
        padding-left: 17px !important ;
    }
    .profileNavbar ul li .link .icon{
        margin-right: 8px;
    }

    @media screen and (min-width:768px) {
        .profileNavbar{
        min-height: 70vh !important;
    }
    }

    @media screen and (max-width:768px) {
        .profileNavbar{
        padding-top: 10px;
    }
    }

</style>