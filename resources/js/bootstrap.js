import Vue from 'vue';
import axios from 'axios';
// import moment from 'moment';
// const _ = require('lodash');

window.Vue = Vue;

window.axios = axios;
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

// window.moment = moment;

// require('./bulma-extensions');
