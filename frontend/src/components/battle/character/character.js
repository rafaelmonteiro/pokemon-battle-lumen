export default {
  name: 'character',
  data () {
    return {
      apiUrl: this.$http.options.root
    }
  },
  methods: {
    hit(attack){
      if (this.isCpu) { return; }
      this.$emit('attack', attack);
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