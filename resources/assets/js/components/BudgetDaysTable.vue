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
            <tr v-for="day in formattedBudgetDays">
                <td>{{ day.date }}</td>
                <td>{{ day.start_amount }}</td>
                <td>{{ day.spent_amount }}</td>
                <td>{{ day.remaining }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    import bus from '../EventBus';

    export default {
        props: ['budgetDays'],

        computed: {
            formattedBudgetDays () {
                return this.budgetDays.map(day => {
                    day.remaining = day.start_amount - day.spent_amount;
                    return day
                });
            }
        }
    }
</script>
