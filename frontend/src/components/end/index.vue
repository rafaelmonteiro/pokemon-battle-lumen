<template>
	<div>
		<vue-header>
			<small>End of battle</small>
		</vue-header>
		<div class="jumbotron">
			<h1>
				<i v-if="values.playerWins" class="fa fa-trophy" aria-hidden="true"></i>
				<i v-if="!values.playerWins" class="fa fa-frown-o" aria-hidden="true"></i>
				{{message}}
			</h1>
			<img :src="apiUrl + winner.avatar" :alt="winner.name" /> 
			<p><b>{{winner.name}}</b> is the winner!!! <b>{{loser}}</b> had no chances and was destroyed!</p>
			<p>
				<router-link class="btn btn-primary btn-lg" :to="{ name: 'selection' }">
					<i class="fa fa-circle-o-notch" aria-hidden="true"></i> Try again
				</router-link>
			</p>
		</div>
	</div>	
</template>
<script src="./end.js"></script>
<style scoped src="./end.css"></style>