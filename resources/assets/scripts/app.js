
require('./bootstrap')
window.Vue = require('vue')
import router from './app-router.js'
import store from './store/index.js'
import VueAnime from './plugins/anime.js'
import VueFullPage from 'vue-fullpage.js'
import Vue2TouchEvents from 'vue2-touch-events'

import App from './App.vue'



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 
[Vue2TouchEvents, VueFullPage, VueAnime].forEach((plugin) => Vue.use(plugin))
Vue.prototype.$eventBus = new Vue(); // Global event bus
const app = new Vue({
  el: '#app',
  store: store,
  router,
  template: '<App/>',
  components: { App },
});
