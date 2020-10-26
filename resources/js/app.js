require('./bootstrap');
window.Vue = require('vue');
Vue.use(axios, axios)
// Vue.component('content_student', require('./components/Content.vue').default);
Vue.component('app', require('./components/App.vue').default);

const app = new Vue({
  el: '#app'
});