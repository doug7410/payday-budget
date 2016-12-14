<template>
    <div>
        <h5>Add transaction for today</h5>
        <form>
            <div class="form-group row">
                <label for="description" class="col-sm-4 col-form-label">Description</label>
                <div class="col-sm-8">
                    <input type="text" v-model="description" class="form-control" id="description" name="description">
                </div>
            </div>
            <div class="form-group row">
                <label for="amount" class="col-sm-4 col-form-label">Amount</label>
                <div class="col-sm-8">
                    <input type="number" v-model="amount" class="form-control" id="amount" name="amount">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-12">
                    <span class="btn btn-primary btn-sm" @click="addTransaction">Add Transaction</span>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import bus from '../EventBus';

    export default{
        data(){
            return{
                description: this.description,
                amount: this.amount
            }
        },
        props: {
            budgetId: {}
        },

        methods: {
            addTransaction(){
                this.$http.post('/api/daily_transaction', {
                    budget_id: this.budgetId,
                    description: this.description,
                    amount: this.amount
                }).then((budget) => {
                    this.description = null;
                    this.amount = null;
                    bus.$emit('transaction-created', budget.data);
                }, (response) => {
                    // error callback
                });
            }
        }
    }
</script>
