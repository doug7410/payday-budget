<template>

    <div class="container" v-if="budgetLoading || expensesLoading">
        Loading...
    </div>
    <div class="container" v-else>
        <div class="row">
                <div class="col-sm-4">
                    <div class="info-cell border-right">
                        <h5>Budget info</h5>
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th>Start Date</th>
                                <td>{{ budget.start_date }}</td>
                            </tr>
                            <tr>
                                <th>End Date</th>
                                <td>{{ budget.end_date }}</td>
                            </tr>
                            <tr>
                                <th>Start Amount</th>
                                <td>{{ budget.start_amount }}</td>
                            </tr>
                            <tr>
                                <th>Total Expenses</th>
                                <td>{{ budget.totalExpenses }}</td>
                            </tr>
                            <tr>
                                <th>Remaining</th>
                                <td>{{ budget.remainingAfterExpenses }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class=" info-cell border-right">
                        <transaction-form :budget-id="budget.id"></transaction-form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <h5>Over/Under</h5>
                    <div class="info-cell">
                        <budget-over-under :over-under-amount="budget.overUnderAmount"></budget-over-under>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-sm-3">
                <h5>Expenses</h5>
                <a :href="expensesCreateUrl">add expense</a>
                <budget-expense-table :budget-expenses="budgetExpenses"></budget-expense-table>
            </div>
            <div class="col-sm-5">
                <budget-days-table :budget-days="budgetDays"></budget-days-table>
            </div>
            <div class="col-sm-4">
                <transaction-list :transactions="transactions"></transaction-list>
            </div>
        </div>
    </div>
</template>

<script>
    import TransactionForm from '../components/TransactionForm.vue';
    import BudgetDaysTable from '../components/BudgetDaysTable.vue';
    import TransactionList from '../components/TransactionList.vue';
    import BudgetOverUnder from '../components/BudgetOverUnder.vue';
    import BudgetExpenseTable from '../components/BudgetExpenseTable.vue';


    export default{
        data(){
            return{
                budgetLoading: true,
                expensesLoading: true
            }
        },

        components: { TransactionForm, BudgetDaysTable, TransactionList, BudgetOverUnder, BudgetExpenseTable },

        computed: {
            budget () {
                return this.$store.state.budget
            },
            budgetExpenses () {
                return this.$store.state.budgetExpenses
            },
            budgetDays () {
                return this.$store.getters.budgetDays;
            },
            transactions () {
                return this.$store.getters.transactions;
            },
            expensesCreateUrl () {
                return `/budget/${this.budget.id}/expenses/create`;
            }
        },

        created() {
            this.$store.dispatch('getBudget', this.budgetId).then(() => this.budgetLoading = false);
            this.$store.dispatch('getExpenses', this.budgetId).then(() => this.expensesLoading = false)

        },

        props: ['budgetId']

    }
</script>
