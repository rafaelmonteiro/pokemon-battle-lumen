<template>
  <div>
    <character :player="player"></character>
    <character :is-cpu="true" :player="against"></character>
  </div>
</template>

<script src="./battle.js"></script>
