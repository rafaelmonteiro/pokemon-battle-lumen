import character from './character'
import actions from './actions'

export default {
  name: 'battle',
  data () {
    return {
    	player : { }, 
    	against : { },
      actions: { player:[], against:[] },
      currentHealth: { player: 0, against: 0 }
    }
  },
  methods: {
    formatData(attack){
      return {
        player : {
          name : this.player.name,
          currentHealth : this.currentHealth.player,
          attack : attack.name
        },
        against : {
          name : this.against.name,
          currentHealth : this.currentHealth.against
        }
      }
    },
    attack(attack){

      this.$http.post('hit', this.formatData(attack))
      .then(response => { 
        this.actions.player.splice(0, 0, response.data.player);
        this.currentHealth.against = response.data.against.currentHealth;

        setTimeout(() => {
          this.actions.against.splice(0, 0, response.data.against);
          this.currentHealth.player = response.data.player.currentHealth;
        }, 2000);
        
      }, response => {

      });
    },
    start(){
      this.currentHealth.player = this.player.health;
      this.actions.player = [];
      this.currentHealth.against = this.against.health;
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