import character from './character'

export default {
  name: 'battle',
  data () {
    return {
    	player : {
        "name" : "Pikachu",
        "type" : "electric",
        "avatar" : "avatarurl.extension",
        "attacks" : [
            {
                "name": "thunderbolt",
                "power": 50,
                "type" : "electric",
                "accuracy": 70
            },
            {
                "name" : "tackle",
                "power": 30,
                "type" : "normal",
                "accuracy": 85
            }
        ],
        "health" : 75,
        "agility": 95,
        "attack": 65,
        "defense": 55
      }, 
    	against : {
        "name" : "Charmander",
        "type" : "fire",
        "avatar" : "avatarurl.extension",
        "attacks" : [
            {
                "name": "flame",
                "power": 50,
                "type" : "fire",
                "accuracy": 85
            }
        ],
        "health" : 75,
        "agility": 95,
        "attack": 55,
        "defense": 55
      } 
    }
  },
  created() {
    // this.$http.post('select', {name : this.$route.params.pokemon })
    // .then(response => { 
    //   console.log(response);
    // }, response => {

    // });
  },
  components: { character }
}