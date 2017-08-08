import Vue from 'vue'
import Router from 'vue-router'
import selection from '@/components/selection'
import battle from '@/components/battle'
import end from '@/components/end'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '*',
      name: 'selection',
      component: selection
    },
    {
      path: '/end',
      name: 'end',
      component: end,
      params:{
        player: {},
        against: {},
        playerWins: null
      }
    },
    {
      path: '/battle/:pokemon',
      name: 'battle',
      component: battle
    }
  ]
})
