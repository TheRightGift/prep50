/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('home', require('./components/home.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue')
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue')
);
// Vue.component('welcome', require('./components/views/Welcome.vue'));
import Vue from 'vue'
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios'
import Axios from 'axios'
import VueQuillEditor from 'vue-quill-editor'
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
import M from 'materialize-css/dist/css/materialize.min.css'
import 'materialize-css/dist/js/materialize.min'

import 'sweetalert2'

import swal from 'sweetalert2';
window.Swal = swal;
// import 'materialize-css/dist/fonts/material-icons.css'



Vue.config.productionTip = false
// Vue.config.devtools = true

Vue.use(VueRouter)
Vue.use(VueQuillEditor)
Vue.use(VueAxios, Axios)
Vue.use(M)

import Subject from './components/subjects/Subject.vue';
import Topic from './components/topics/Topic.vue';
import Objective from './components/objective/Objective.vue';
import Question from './components/questions/Question.vue';
import Dashboard from './components/Welcome.vue';
import App from './components/AppComponent.vue';
import Home from './components/home.vue';


const routes = [

  { path: '/dashboard', component: Dashboard, name: 'dashboard' },
  { path: '/subject', component: Subject, name: 'subject' },
  { path: '/topic', component: Topic, name: 'topic' },
  { path: '/question', component: Question, name: 'question' },
  { path: '/objective', component: Objective, name: 'objective' },
  { path: '/home', component: Home, name: 'home' },
]

const router = new VueRouter({
  mode: 'history',
  routes,
})

const app = new Vue({
  el: '#app',
  components: { App },
  // render: h => h(Dashboard),
  router,
})
      // .$mount('#app')
