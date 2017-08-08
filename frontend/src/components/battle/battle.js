import character from './character'
import actions from './actions'

export default {
  name: 'battle',
  data () {
    return {
    	player : { }, 
    	against : { },
      actions: { player:[], against:[] } 
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
        this.actions.player.push(response.data.player);

        setTimeout(() => {
          this.actions.against.push(response.data.against)
        }, 2000);
        
      }, response => {

      });
    },
    start(){
      this.player.currentHealth = this.player.health;
      this.actions.player = [];
      this.against.currentHealth = this.against.health;
      this.actions.against = [];
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
  components: { character, actions }
}