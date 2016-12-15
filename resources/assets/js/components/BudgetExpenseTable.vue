<template>
    <div>
        <table class="table table-bordered table-sm">
            <tr>
                <th>Description</th>
                <th>Amount</th>
            </tr>
            <tr v-for="expense in budgetExpenses">
                <td>{{ expense.description }}</td>
                <td>{{ expense.amount }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default{
        props: ['budgetExpenses']

    }
</script>
