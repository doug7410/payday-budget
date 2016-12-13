<template>
    <div>
        <h5>Transactions</h5>
        <table class="table table-bordered table-sm">
            <tr>
                <th>Desc</th>
                <th>Amount</th>
            </tr>
            <tr v-for="transaction in dailyTransactions">
                <td>{{ transaction.description }}</td>
                <td>{{ transaction.amount }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    import bus from '../EventBus';

    export default{
        data(){
            return {
                dailyTransactions: {}
            }
        },
        created() {
            this.dailyTransactions = JSON.parse(this.transactions);

            bus.$on('transaction-created', budget => {
                this.dailyTransactions = budget.daily_transactions;
            })
        },
        props: ['transactions'],
    }
</script>
