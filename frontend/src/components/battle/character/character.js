export default {
  name: 'character',
  data () {
    return {
      apiUrl: this.$http.options.root
    }
  },
  computed: {
    lifeStatus: function () {
      return ((100*this.currentHealth)/this.player.health).toFixed(0);
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
    },
    currentHealth:{
      type: Number,
      default: 0
    }
  }
}