<template>
  <div class="container-fluid" id="app">
    <transition name="fade" mode="out-in"><router-view></router-view></transition>
  </div>
</template>

<script>
export default {
  name: 'app'
}
</script>

<style>
  #app{
    position: fixed;
    top: 0;
    left: 0;
    /*background-image: url("./assets/stage.jpg");*/
    background-position: center;
    background-repeat: no-repeat;
    height: 100%;
    width: 100%;
  }
  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    opacity: 0
  }
  .form-control{
    text-align: left !important;
  }
</style>