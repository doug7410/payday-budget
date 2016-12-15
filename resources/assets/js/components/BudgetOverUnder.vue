<template>
    <div>
        <span :class="textColor">
            {{ formattedAmount }}
        </span>
    </div>
</template>

<script>
    export default{
        props: ['overUnderAmount'],
        computed: {
            textColor() {
                return (this.overUnderAmount < 0) ? 'txtRed' : '';
            },
            formattedAmount() {
                const amount = this.overUnderAmount.toString().replace('-','');
                return `$${amount}`;
            }
        }
    }
</script>

<style>
    .txtRed{
        color: red;
    }
</style>
