
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//require('../../../node_modules/vue-cookie/build/vue-cookie.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('productattributeprice', require('./components/ProductAttributePrice.vue'));
Vue.component('shoppingcart', require('./components/ShoppingCart.vue'));
Vue.component('shoppingcartsummary', require('./components/ShoppingCartSummary.vue'));
Vue.component('bundleoptions', require('./components/BundleOptions.vue'));

const app = new Vue({
    el: '#bodycomponent'
});

const app2 = new Vue({
  el: '#header'
})