import help from './help'

export default {
  name: 'header',
  methods: {
  	help(){
  		this.$refs.help.open()
  	}
  },
  components: { help }
}