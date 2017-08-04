<template>
  <div>
    <character></character>
    <health></health>
    <scout></scout>
  </div>
</template>

<script>
import character from './character'
import health from './health'
import scout from './scout'

export default {
  name: 'hello',
  data () {
    return { 
    }
  },
  components: { character, health, scout }
}
</script>