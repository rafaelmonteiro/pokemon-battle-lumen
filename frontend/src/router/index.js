import Vue from 'vue'
import Router from 'vue-router'
import selection from '@/components/selection'
import battle from '@/components/battle'

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
      path: '/battle/:pokemon',
      name: 'battle',
      component: battle
    }
  ]
})
