/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

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

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


//autocompilazione slug nei nuovi post
const inputSlug = document.querySelector('#input-slug');
const inputTitle = document.querySelector('#input-title');

if (inputSlug) {
   inputTitle.addEventListener('focusout', function() {
      const inputSlug = document.querySelector('#input-slug');
      inputTitle.value;

      Axios.post('/admin/slugger', {
         string: inputTitle.value,
      }).then(function (response) {
         inputSlug.value = response.data.slug;
      });
   });
}



//reset campi form
const btnReset = document.querySelector('#btn-reset');
const inputForm = document.querySelector('#input-form');

if (btnReset) {
   btnReset.addEventListener('click', function(){
      inputForm.reset();
   });
}



//eliminazione da pagina index
const btnDel = document.querySelectorAll('.btn-del');
const indexForm = document.querySelector('#indexForm');

btnDel.forEach(btn => {
   btn.addEventListener('click', function(){
      if (this.dataset.type == 'post') {
         indexForm.action = this.dataset.baseurl + '/' + this.dataset.slug
      } else if (this.dataset.type == 'category') {
         indexForm.action = this.dataset.baseurl + '/' + this.dataset.id
      } else {
         //nothing
      }
   });
});
