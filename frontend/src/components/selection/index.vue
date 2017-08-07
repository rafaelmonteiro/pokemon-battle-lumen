<template>
	<div>
		<div class="page-header">
			<h1>Pokémon Battle <small>select your Pokémon</small></h1>
		</div>
	  	<div class="row">
		  <div v-for="player in players" class="col-md-3">
		    <div v-on:click="select(player)" class="thumbnail">
 	        	<div class="title">
 	        		<h3>{{player.name}}</h3>
	 	        	<p>
						<span class="label label-primary">Health: {{player.health}}</span>
						<span class="label label-success">Agility: {{player.agility}}</span>
						<span class="label label-info">Defense: {{player.defense}}</span>
					</p>
 	        	</div>
				<div class="container-image">
					<img :src="apiUrl+player.avatar" />
				</div>
				<div class="caption">
				<ul title="Attacks" v-if="player.attacks" class="list-group">
				  <li v-for="attack in player.attacks" class="list-group-item">
				  	<span class="attack-name">{{attack.name}}:</span>
				  	<span title="Type" class="label label-default">{{attack.type}}</span>
				  	<span class="label label-danger">Power: {{attack.power}}</span>
				  	<span title="Accuracy" class="label label-warning">Acc.: {{attack.accuracy}}</span>
				  </li>
				</ul>
				</div>
		    </div>
		  </div>
		</div>
	</div>
</template>

<script src="./selection.js"></script>
<style scoped src="./selection.css"></style>
