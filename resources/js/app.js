/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const ElementUI = require('element-ui');

window.Vue = require('vue');

Vue.use(ElementUI);

const VueTimers = require('vue-timers');
 
Vue.use(VueTimers)

import store from './store';

const VueCookies = require('vue-cookies');

Vue.use(VueCookies)

// import DatatableFactory from 'vuejs-datatable';
import DatatableFactory from 'vuejs-datatable/dist/vuejs-datatable.esm.js';
Vue.use(DatatableFactory);

import Editor from '@tinymce/tinymce-vue';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('editor', Editor);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('seat-selector', require('./components/SeatSelector.vue').default);
Vue.component('login-modal', require('./components/LoginModal.vue').default);
Vue.component('navbar-button', require('./components/Navbar.vue').default);
Vue.component('signup-form', require('./components/Signup.vue').default);
Vue.component('main-slider', require('./components/MainSlider.vue').default);
Vue.component('add-credit', require('./components/AddCredit.vue').default);

// Admin Components
Vue.component('sidebar-admin', require('./components/admin/SidebarNav.vue').default);
Vue.component('users-list', require('./components/admin/UsersList.vue').default);
Vue.component('events-list', require('./components/admin/EventsList.vue').default);
Vue.component('event', require('./components/admin/Event.vue').default);

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    store,
    el: '#app',
});