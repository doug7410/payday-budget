<template>
    <div v-if="isLoading">
        Loading...
    </div>
    <div class="row" v-else>
        <a :href="budgetUrl">View Budget</a>
        <div class="col-sm-4">
            <h5>Add expense to budget</h5>
            <budget-expense-form :budget-id="budgetId"></budget-expense-form>
        </div>
        <div class="col-sm-8">
            <budget-expense-table :budget-expenses="budgetExpenses"></budget-expense-table>
        </div>
    </div>
</template>

<script>
    import BudgetExpenseForm from '../components/BudgetExpenseForm.vue';
    import BudgetExpenseTable from '../components/BudgetExpenseTable.vue';

    export default{
        data(){
            return{
                isLoading: true,
            }
        },

        props: ['budgetId'],

        computed: {
            budgetExpenses() {
                return this.$store.state.budgetExpenses;
            },
            budgetUrl() {
                return `/budget/${this.budgetId}`
            }
        },

        components: { BudgetExpenseForm, BudgetExpenseTable },

        created() {
            this.$store.dispatch('getExpenses', this.budgetId).then(() => this.isLoading = false)
        }
    }
</script>
