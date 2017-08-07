export default {
  name: 'character',
  data () {
    return {
      apiUrl: this.$http.options.root
    }
  },
  props: {
  	player: {
      type: Object,
      required: true
    },
    isCpu:{
    	type: Boolean,
    	default: false
    }
  }
}