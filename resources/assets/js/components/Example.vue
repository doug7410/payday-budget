<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                        {{ start_date }} - {{ end_date }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                start_date: this.startDate,
                end_date: this.endDate,
                start_amount: this.startAmount,
                days: null
            }
        },
        props: {
            startDate: {},
            endDate: {},
            startAmount: {}
        },
        created() {
            this.days = [];
            const startDate = new Date(this.start_date);
            const endDate = new Date(this.end_date);
            const numberOfDays = parseInt((endDate.getTime() - startDate.getTime())/(24*3600*1000)) + 1;
            const dailyBudgetAmount = this.start_amount / numberOfDays;
            console.log(numberOfDays);
            console.log(dailyBudgetAmount);
        }
    }

</script>
