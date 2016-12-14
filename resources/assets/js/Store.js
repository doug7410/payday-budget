import Vuex from 'vuex';
import Vue from 'vue';
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        count: 0,
        budget: {}
    },
    mutations: {
        getBudget (state) {
            //
        }
    }
})