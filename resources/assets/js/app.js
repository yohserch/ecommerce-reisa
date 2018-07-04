
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.swal = require('sweetalert2');

const Vuex = require('vuex');
Vue.use(Vuex)


window.store = new Vuex.Store({
    state: {
        productsCount: 0
    },
    getters: {
        getProds: (state) => {
            return state.productsCount;
        }
    },
    mutations: {
        increment(state) {
            return state.productsCount += 1;
        },
        decrement(state) {
            return state.productsCount -= 1;
        },
        set(state, value) {
            return state.productsCount = value;
        }
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('products-component', require('./components/products/ProductsComponent.vue'));
Vue.component('add-product-btn', require('./components/products/AddToCartComponent.vue'));
Vue.component('remove-product-btn', require('./components/products/RemoveFromCartComponent.vue'));
Vue.component('reset-cart-btn', require('./components/products/ResetCartComponent.vue'));
Vue.component('product-counter-component', require('./components/shopping_cart/CounterComponent.vue'));
Vue.component('products-shopping-cart-component', require('./components/shopping_cart/ProductsShoppingCartComponent.vue'))
Vue.component('product-card-component', require('./components/products/ProductCardComponent.vue'));
Vue.component('material-transition-group', require('./components/animations/MaterialCollectionComponent.vue'));

const app = new Vue({
    el: '#app',
    store: window.store
});
