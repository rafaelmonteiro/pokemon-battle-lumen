<template>
<div class="thumbnail">
	<div class="title">
		<h3>{{player.name}}</h3>
    	<p>
			<span class="label label-primary">Health: {{player.health}}</span>
			<span class="label label-success">Agility: {{player.agility}}</span>
			<span class="label label-info">Defense: {{player.defense}}</span>
		</p>
	</div>
	<!-- <img src="../../assets/default.png" /> -->
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
</template>

<script src="./character.js"></script