<template>
    <div>
        <h5>Transactions</h5>
        <table class="table table-bordered table-sm">
            <tr>
                <td>Date</td>
                <th>Desc</th>
                <th>Amount</th>
            </tr>
            <tr v-for="transaction in transactions">
                <td>{{ transaction.date }}</td>
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
        props: ['transactions'],
    }
</script>
