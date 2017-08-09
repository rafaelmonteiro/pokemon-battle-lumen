<template>
	<div class="page-header">
		<h1>
			<router-link class="hidden-xs" :to="{ name: 'selection' }">
				Pokémon Battle
			</router-link>
			<slot></slot>	
		</h1>
		<i v-on:click="help" class="fa fa-info-circle help" aria-hidden="true"></i>
		<help ref="help"></help>
	</div>
</template>
<script src="./header.js"></script>
<style scoped src="./header.css"></style>