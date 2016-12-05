
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
var VueResource = require('vue-resource');

Vue.use(VueResource);

function addDays(date, days) {
    var result = new Date(date);
    result.setDate(result.getDate() + days);
    return result;
}

const app = new Vue({
    el: '#app',
    data: {
        start_date: null,
        end_date: null,
        start_amount: null,
        daily_budget: null,
        days: null,
        budget: {}
    },
    created: function () {
        console.log('created!');
        // GET /someUrl
        this.$http.get('/api/budget/1').then((response) => {
            this.budget = response.data;
        }, (response) => {
            // error callback
        });
    },
    methods: {
        calculate: function () {
            this.days = [];
            var startDate = new Date(this.start_date);
            var endDate = new Date(this.end_date);
            var numberOfDays = parseInt((endDate.getTime() - startDate.getTime())/(24*3600*1000)) + 1;


            this.daily_budget = (this.start_amount / numberOfDays).toFixed(2);

            for(var i = 0; i < numberOfDays; i++)
            {
                var spent = 'spent'+i;
                var date = addDays(startDate, i+1);
                this.days.push({
                    date: dateFormat(date, "mm/dd/yyyy"),
                    allowance: this.daily_budget,
                    spent: 0,
                    remainder: 0
                })
            }
        },
        calculate_remainder: function (daily_budget, spent) {
            console.log(daily_budget-spent);
            // return daily_budget - spent;
        }
    }
});



