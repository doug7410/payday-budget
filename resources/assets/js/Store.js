import Vuex from 'vuex';
import Vue from 'vue';
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        budget: {},
        budgetExpenses: {}
    },
    actions: {
        getBudget ({ commit }, budgetId) {
            return Vue.http.get(`/api/budget/${budgetId}`).then(({ data }) => {
                commit('setBudgetData', data);
            })
        },
        addTransaction ({ commit }, transactionData) {
            return Vue.http.post('/api/daily_transaction', transactionData).then(({ data }) => {
                commit('setBudgetData', data);
            });
        },
        getExpenses ({ commit }, budgetId) {
            return Vue.http.get(`/api/budget/${budgetId}/expenses`).then(({ data }) => {
                commit('setBudgetExpensesData', data);
            });
        },
        addExpense ({ commit }, expenseData) {
            return Vue.http.post(`/api/budget/${expenseData.budget_id}/expenses`, expenseData).then(( {data} ) => {
                commit('setBudgetExpensesData', data);
            });
        }
    },
    getters: {
        budgetDays: (store) => {
            return store.budget.budgetDays;
        },
        transactions: (store) => {
            return store.budget.transactions.reverse();
        }
    },
    mutations: {
        setBudgetData (state, budgetData) {
            state.budget = budgetData
        },
        setBudgetExpensesData (state, budgetExpensesData) {
            state.budgetExpenses = budgetExpensesData
        }
    }
})