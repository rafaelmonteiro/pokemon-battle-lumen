<template>
  <div class="container-fluid" id="app">
    <router-view></router-view>
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
    background-image: url("./assets/stage.jpg");
    background-position: center;
    background-repeat: no-repeat;
    height: 100%;
    width: 100%;
  }
</style>