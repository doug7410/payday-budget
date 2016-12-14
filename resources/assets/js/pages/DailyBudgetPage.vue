<template>
    <div class="container">
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
                        <budget-over-under :amount="budget.overUnderAmount"></budget-over-under>
                    </div>
                </div>
            </div>
            <div class="row">
        </div>
        <div class="col-sm-8">
            <budget-days-table :budget-days="budget.budget_days"></budget-days-table>
        </div>
        <div class="col-sm-4">
            <transaction-list :transactions="budget.daily_transactions"></transaction-list>
        </div>
    </div>
</template>

<script>
    import TransactionForm from '../components/TransactionForm.vue';
    import BudgetDaysTable from '../components/BudgetDaysTable.vue';
    import TransactionList from '../components/TransactionList.vue';
    import BudgetOverUnder from '../components/BudgetOverUnder.vue';

    import bus from '../EventBus';


    export default{
        data(){
            return{
                budget: {}
            }
        },

        created() {
            this.budget = JSON.parse(this.budgetJson);

            bus.$on('transaction-created', budget => {
                this.budget = budget;
            })
        },

        props: ['budgetJson'],

        components: { TransactionForm, BudgetDaysTable, TransactionList, BudgetOverUnder }
    }
</script>
