import 'bootstrap/dist/css/bootstrap.css'
import 'font-awesome/css/font-awesome.css'

import Vue from 'vue'
import App from './App'
import router from './router'
import autoProgress from 'vue-auto-progress'
import toastr from 'vue-toastr'
import vueResource from 'vue-resource'

Vue.use(vueResource)
window.jQuery = require('jquery');
require('bootstrap');

Vue.config.productionTip = false
Vue.http.options.root = 'http://localhost:8000';

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<div><App/><toastr ref="toastr"/><auto-progress/></div>',
  components: { App, toastr, autoProgress }
})
