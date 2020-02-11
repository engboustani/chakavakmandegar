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

import { Icon }  from 'leaflet'
import 'leaflet/dist/leaflet.css'

// this part resolve an issue where the markers would not appear
delete Icon.Default.prototype._getIconUrl;

Icon.Default.mergeOptions({
  iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
  iconUrl: require('leaflet/dist/images/marker-icon.png'),
  shadowUrl: require('leaflet/dist/images/marker-shadow.png')
});

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
Vue.component('ticket-shop', require('./components/TicketShop.vue').default);
Vue.component('login-modal', require('./components/LoginModal.vue').default);
Vue.component('login-view', require('./components/Login.vue').default);
Vue.component('navbar-button', require('./components/Navbar.vue').default);
Vue.component('signup-form', require('./components/Signup.vue').default);
Vue.component('main-slider', require('./components/MainSlider.vue').default);
Vue.component('add-credit', require('./components/AddCredit.vue').default);
Vue.component('google-map', require('./components/Map.vue').default);
Vue.component('event-gallery', require('./components/EventGallery.vue').default);
Vue.component('pay-factor', require('./components/PayFactor.vue').default);
Vue.component('tickets-user', require('./components/Tickets.vue').default);
Vue.component('payments-user', require('./components/Payments.vue').default);
Vue.component('course-signup', require('./components/Course.vue').default);
Vue.component('widget-home-login', require('./components/WidgetHomeLogin.vue').default);

// Admin Components
Vue.component('sidebar-admin', require('./components/admin/SidebarNav.vue').default);
Vue.component('users-list', require('./components/admin/UsersList.vue').default);
Vue.component('events-list', require('./components/admin/EventsList.vue').default);
Vue.component('event', require('./components/admin/Event.vue').default);
Vue.component('eventtimes-list', require('./components/admin/EventtimesList.vue').default);
Vue.component('eventtime', require('./components/admin/Eventtime.vue').default);
Vue.component('posts-list', require('./components/admin/PostsList.vue').default);
Vue.component('post', require('./components/admin/Post.vue').default);
Vue.component('page', require('./components/admin/Page.vue').default);
Vue.component('dashboard', require('./components/admin/Dashboard.vue').default);
Vue.component('payments-list', require('./components/admin/PaymentsList.vue').default);
Vue.component('courses-list', require('./components/admin/CoursesList.vue').default);
Vue.component('course', require('./components/admin/Course.vue').default);
Vue.component('gallery-widget', require('./components/admin/GalleryWidget.vue').default);
Vue.component('tickets-list', require('./components/admin/TicketsList.vue').default);
Vue.component('setting-salon', require('./components/admin/SettingSalon.vue').default);

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
    methods: {
        paymentFailed: function() {
            this.$alert('This is a message', 'Title', {
                confirmButtonText: 'OK',
                callback: action => {
                    
                }
            });
        }
    }
});