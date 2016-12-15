<template>
    <div>
        <h5>Daily Budget</h5>
        <table class="table table-bordered table-sm">
            <tr>
                <th>Date</th>
                <th>Start Amount</th>
                <th>Spent</th>
                <th>Remaining</th>
            </tr>
            <tr v-for="day in budgetDays">
                <td>{{ day.date }}</td>
                <td>{{ day.start_amount }}</td>
                <td>{{ day.spent_amount }}</td>
                <td>{{ day.remaining }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['budgetDays']
    }
</script>
