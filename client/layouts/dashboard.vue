<template>
    <div>
    <Navbar/>
    <div class="bashboard-content bg-color py-3">
        <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ProfileNavbar/>
            </div>
            <div class="col-md-9">
                <div class="card card-body border-0 side-contents">
                <Nuxt/>
                </div>
            </div>
        </div>
    </div>
    </div>
    <Footer/>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.side-contents{
    height: 100%;
}
    
</style>