<template>
  <div>
    <selection></selection>
    <character></character>
    <health></health>
    <scout></scout>
  </div>
</template>

<script>
import selection from '@/components/player/selection'
import character from '@/components/player/character'
import health from '@/components/player/health'
import scout from '@/components/player/scout'

export default {
  name: 'hello',
  data () {
    return { }
  },
  components: { selection, character, health, scout }
}
</script>