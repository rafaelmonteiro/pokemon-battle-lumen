<template>
  <div>
  	<vue-header>
		<small>{{player.name}}</small> X <small>{{against.name}}</small>
	</vue-header>
	<div class="row">
	    <div class="col-md-6">
		    <div class="player">
		    	<character v-on:attack="attack" :current-health="currentHealth.player" :player="player"></character>
		    	<actions :items="actions.player" ></actions>
		    </div>
	    </div>
	    <div class="col-md-6">
		    <div class="player">
		    	<character :is-cpu="true" :current-health="currentHealth.against" :player="against"></character>
		    	<actions :items="actions.against" ></actions>
		    </div>
	    </div>
	</div>
  </div>
</template>

<script src="./battle.js"></script>
<style scoped src="./battle.css"></style>
