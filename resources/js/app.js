/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Components
Vue.component('badge', require('./components/bootstrap/Badge.vue').default);
Vue.component('base-alert', require('./components/bootstrap/BaseAlert.vue').default);
Vue.component('base-button', require('./components/bootstrap/BaseButton.vue').default);
Vue.component('base-checkbox', require('./components/bootstrap/BaseCheckbox.vue').default);
Vue.component('base-bropdown', require('./components/bootstrap/BaseDropdown.vue').default);
Vue.component('base-header', require('./components/bootstrap/BaseHeader.vue').default);
Vue.component('base-input', require('./components/bootstrap/BaseInput.vue').default);
Vue.component('base-nav', require('./components/bootstrap/BaseNav.vue').default);
Vue.component('base-pagination', require('./components/bootstrap/BasePagination.vue').default);
Vue.component('base-progress', require('./components/bootstrap/BaseProgress.vue').default);
Vue.component('base-radio', require('./components/bootstrap/BaseRadio.vue').default);
Vue.component('base-slider', require('./components/bootstrap/BaseSlider.vue').default);
Vue.component('base-switch', require('./components/bootstrap/BaseSwitch.vue').default);
Vue.component('base-table', require('./components/bootstrap/BaseTable.vue').default);
Vue.component('card', require('./components/bootstrap/Card.vue').default);
Vue.component('modal', require('./components/bootstrap/Modal.vue').default);
Vue.component('stats-card', require('./components/bootstrap/StatsCard.vue').default);

// Pages
Vue.component('dashboard-view', require('./components/pages/DashboardView.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
