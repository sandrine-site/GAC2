//Import dependences.
import Vue from 'vue'
const queryString = require('query-string')
import axios from 'axios'

//init config
//init config
window.Vue = require('vue');
var VueResource = require('vue-resource');
Vue.use(VueResource);
Vue.http.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;
