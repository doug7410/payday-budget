<template>
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
                <input type="number" step="0.01" v-model="amount" class="form-control" id="amount" name="amount">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-12">
                <span class="btn btn-primary btn-sm" @click="addExpense">Add Expense</span>
            </div>
        </div>
    </form>
</template>

<script>
    export default{
        data(){
            return{
                description: this.description,
                amount: this.amount
            }
        },

        props: ['budgetId'],

        methods: {
            addExpense(){
                this.$store.dispatch('addExpense', {
                    budget_id: this.budgetId,
                    description: this.description,
                    amount: this.amount
                }).then(() => {
                    this.description = null;
                    this.amount = null;
                })
            }
        }
    }
</script>
