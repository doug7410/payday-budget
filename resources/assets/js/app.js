
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var dateFormat = require('dateformat');

import BudgetDaysTable from './components/BudgetDaysTable.vue';
import TransactionForm from './components/TransactionForm.vue';
import TransactionList from './components/TransactionList.vue';
import BudgetOverUnder from './components/BudgetOverUnder.vue';

const app = new Vue({
    el: '#app',
    components: { BudgetDaysTable, TransactionForm, TransactionList, BudgetOverUnder },
    data: {

    },
    created: function () {

    },
    methods: {

    }
});



