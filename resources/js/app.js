window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = require('vue');

Vue.component('header-container', require('./components/HeaderContainer.vue').default);
Vue.component('image-container', require('./components/Image/ImageContainer.vue').default);

const eventHub = new Vue();

Vue.mixin({
    data: function () {
        return {
            eventHub: eventHub
        }
    }
})
const app = new Vue({
    el: '#app',
});
