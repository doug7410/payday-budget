<template>
    <div>
        <div>{{ formattedAmount }}</div>
    </div>
</template>

<script>
    export default{
        props: ['amount'],

        computed: {
            formattedAmount() {
                return '$'+this.amount;
            }

        }
    }
</script>
