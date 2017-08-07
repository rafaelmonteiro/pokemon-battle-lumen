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
      console.log(response);
    }, response => {

    });
  },
  components: { character }
}