<template>
	<div class="panel panel-info">
	  <div class="panel-heading">Actions</div>
	  <div class="panel-body">
	    <p v-for="item in items"> 
	    	{{item.name}} attacked with <span class="label label-primary">{{item.attack}}</span><br/>
	    	damage caused: <span class="label label-danger">{{item.damage}}</span>
	    	<br/><b>{{item.desc ? item.desc : ''}}</b>
	    </p>
	  </div>
	</div>
</template>

<script src="./actions.js"></script>
<style scoped src="./actions.css"></style>