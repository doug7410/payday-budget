<template>
    <div>
        <div>{{ amount }}</div>
    </div>
</template>

<script>
    import bus from '../EventBus';

    export default{
        data(){
            return{
                budget: []
            }
        },
        props: ['initialBudget'],

        created() {
            this.budget = JSON.parse(this.initialBudget);

            bus.$on('transaction-created', budget => {
                this.budget = budget;
            })
        },

        computed: {
            amount() {
                return this.budget.overUnderAmount;
            }
        }
    }
</script>
