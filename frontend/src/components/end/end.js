import vueHeader from '@/components/header'

export default {
  name: 'end',
  data () {
    return {
      values: this.$route.params,
      apiUrl: this.$http.options.root
    }
  },
  computed: {
  	message: function() { return this.values.playerWins ? 'Congratulations you won!' : 'You lose!' },
  	winner: function(){ 
  	  if(this.values.playerWins){
  	  	return { name: this.values.player.name, avatar: this.values.player.avatar } 
  	  } 

  	  return { name: this.values.against.name, avatar: this.values.against.avatar }
  	},
  	loser: function(){return this.values.playerWins ? this.values.against.name : this.values.player.name } 
  },
  created() {
  	if (this.values.playerWins == undefined) {
  		this.$router.push({ name: 'selection' });
  		return;
  	}
  },
  components: { vueHeader }
}