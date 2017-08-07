export default {
  name: 'selection',
  methods: {
    select(player){
      this.$router.push({ name: 'battle', params: { pokemon: player.name } })
    }
  },
  data () {
    return {
      players: []
    }
  },
  created() {
    this.$http.get('all')
    .then(response => { 
      this.players = response.data;
    }, response => {

    });
  }
}