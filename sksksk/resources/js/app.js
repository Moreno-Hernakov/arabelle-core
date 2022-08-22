
require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
import Swal from 'sweetalert2';
import Chartkick from 'vue-chartkick'
import Chart from 'chart.js'

Vue.use(Chartkick.use(Chart))


Vue.use(VueRouter);





Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('sidebar-component', require('./components/sidebar.vue').default);
Vue.component('sidebar-component', require('./components/newdashboardlayout/sidebar.vue').default);
Vue.component('page-title-component', require('./components/newdashboardlayout/pageTitle.vue').default);
Vue.component('profile-image-component', require('./components/newdashboardlayout/profileImage.vue').default);
Vue.component('login-component', require('./components/login.vue').default);
Vue.component('regis-component', require('./components/regis.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const dashboard = require('./components/dashboard.vue').default;
const crud = require('./components/crud.vue').default;
const mainpage = require('./components/newcontent/mainpage.vue').default;
const crudpage = require('./components/newcontent/crudpage.vue').default;
const socialpage = require('./components/newcontent/socialpage.vue').default;
const profile = require('./components/newcontent/profile.vue').default;
const profileUser = require('./components/newcontent/profileUser.vue').default;
const bookmark = require('./components/newcontent/bookmark.vue').default;
// const regis = require('./components/regis.vue').default;

const routes = [
    {path: '/vuecrud', component: crud},
    {path: '/mainpage', component: mainpage, name: 'vuedash'},
    {path: '/socialpage', component: socialpage, name: 'social'},
    {path: '/profile/:idnya?', component: profile, props: true},
    {path: '/:idnya(\\d+)?', component: profileUser, props: true},
    {path: '/bookmark', component: bookmark},
    {path: '/crudpage', component: crudpage}
]

const router = new VueRouter({
    mode: 'history',
    routes
})




const app = new Vue({
    el: '#app',
    router
});
