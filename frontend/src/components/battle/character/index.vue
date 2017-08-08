<template>
<div class="thumbnail" :class="condition.class" :title="condition.title">
	<div class="title">
		<h3>{{player.name}}</h3>
		<div title="Life" class="progress">
		  <div class="progress-bar progress-bar-success" role="progressbar" :aria-valuenow="lifeStatus" aria-valuemin="0" aria-valuemax="100" :style="'width: ' + lifeStatus +'%'">
		    {{lifeStatus}}%
		  </div>
		</div>
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
		  <li :title="!isCpu ? 'Click to trigger attack' : ''"  v-for="attack in player.attacks" class="list-group-item" v-bind:class="{ 'attack-click': !isCpu}" v-on:click="hit(attack)" >
		  	<span class="attack-name">{{attack.name}}</span>
		  	<span title="Type" class="label label-default">{{attack.type}}</span>
		  	<span class="label label-danger">Power: {{attack.power}}</span>
		  	<span title="Accuracy" class="label label-warning">Acc.: {{attack.accuracy}}</span>
		  </li>
		</ul>
	</div>
</div>
</template>

<script src="./character.js"></script>
<style scoped src="./character.css"></style>