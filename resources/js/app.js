
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
//
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
//

Vue.component('catalogue-component', require('./components/CatalogueComponent.vue').default);
Vue.component('single-product', require('./components/SingleProduct.vue').default);

Vue.component('products-list-component', require('./components/admin/products/ProductsListComponent').default);
Vue.component('product-component', require('./components/admin/products/ProductComponent').default);
Vue.component('add-product-component', require('./components/admin/products/AddProductComponent').default);

Vue.component('news-list-component', require('./components/admin/news/NewsListComponent').default);
Vue.component('news-post', require('./components/admin/news/NewsPost').default);
Vue.component('add-news-modal', require('./components/admin/news/AddNews').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

if($('#products').length !== 0){
    let products = new Vue({
        el :'#products'
    });
};

if($('#news').length !== 0){
    let news = new Vue({
        el :'#news'
    });
};

if($('#single_product').length !== 0){
    let single_product = new Vue({
        el :'#single_product'
    });
};

if($('#catalogue').length !== 0){

    const routes = [
        { path: '/:category_name'},
    ];

    const router = new VueRouter({
        mode: 'history',
        routes // short for `routes: routes`
    });

    let catalogue = new Vue({
        router,
        el :'#catalogue'
    });
}
