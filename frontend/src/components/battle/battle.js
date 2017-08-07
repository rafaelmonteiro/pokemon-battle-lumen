import character from './character'

export default {
  name: 'battle',
  data () {
    return {
    	player : {}, 
    	against : {} 
    }
  },
  created() {
    this.$http.post('select', {name : this.$route.params.pokemon })
    .then(response => { 
      this.player = response.data.player;
      this.against = response.data.against;
    }, response => {

    });
  },
  components: { character }
}