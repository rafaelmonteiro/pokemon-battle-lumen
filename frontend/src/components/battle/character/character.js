export default {
  name: 'character',
  data () {
    return {
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