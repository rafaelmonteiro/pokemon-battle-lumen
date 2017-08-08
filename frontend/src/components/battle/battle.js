import character from './character'

export default {
  name: 'battle',
  data () {
    return {
    	player : {}, 
    	against : {} 
    }
  },
  methods: {
    attack(attack){

      let action = {
        player : {
          name : this.player.name,
          currentHealth : this.player.currentHealth,
          attack : attack.name
        },
        against : {
          name : this.against.name,
          currentHealth : this.against.currentHealth
        }
      }

      this.$http.post('hit', action)
      .then(response => { 
        console.log(response)
      }, response => {

      });
    },
    start(){
      this.player.currentHealth = this.player.health;
      this.against.currentHealth = this.against.health;
    }
  },
  created() {
    this.$http.post('select', {name : this.$route.params.pokemon })
    .then(response => { 
      this.player = response.data.player;
      this.against = response.data.against;
      this.start();
    }, response => {

    });
  },
  components: { character }
}