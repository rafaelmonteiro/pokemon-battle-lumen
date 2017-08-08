<template>
  <div>
  	<div class="page-header">
		<h1><span class="hidden-xs">Pokémon Battle</span> <small>{{player.name}}</small> X <small>{{against.name}}</small></h1>
	</div>
	<div class="row">
	    <div class="col-md-6">
		    <character class="player" v-on:attack="attack" :player="player"></character>
	    </div>
	    <div class="col-md-6">
		    <character class="player" :is-cpu="true" :player="against"></character>
	    </div>
	</div>
  </div>
</template>

<script src="./battle.js"></script>
<style scoped src="./battle.css"></style>
