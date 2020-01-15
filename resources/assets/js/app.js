require('./bootstrap');

window.Vue = require('vue');

//Setup Vue Router
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//v-form setup

import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//Sweet Alert 2
//Import Sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
  toast: true,
  position: 'bottom-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast

//Moment j for filtering
require('./filter');


//Setup vuex
import Vuex from 'vuex'
Vue.use(Vuex)

import storeData from "./store/index"

const store = new Vuex.Store(
   storeData
)

//Routes
import { routes } from './routes';

const router = new VueRouter({
    routes, 
    mode: 'hash',
})


// Vue.component('joyt', require('./components/ExampleComponent.vue').default);

const app = new Vue({
	
    el: '#app',
    router,
    store,

});
