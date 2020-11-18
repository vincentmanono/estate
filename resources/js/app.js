

require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('water-payment', require('./components/WaterPayment.vue').default);


const app = new Vue({
    el: '#app',
});
