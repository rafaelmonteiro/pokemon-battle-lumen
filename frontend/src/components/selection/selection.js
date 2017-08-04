export default {
  name: 'selection',
  methods: {
    select(player){
      this.$router.push({ name: 'battle' })
    }
  },
  data () {
    return {
      players: [
        {
          "name" : "Pikachu",
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
          "defense": 55
        },
        {
          "name" : "Charmander",
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
          "defense": 55
        }
      ]
    }
  }
}