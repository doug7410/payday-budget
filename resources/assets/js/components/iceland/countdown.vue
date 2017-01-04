<template>
    <div id="countdown">
        <div class="block">
            <p class="digit">{{ timeRemaining.days | two_digits }}</p>
            <p class="text">Days</p>
        </div>
        <div class="block">
            <p class="digit">{{ timeRemaining.hours | two_digits }}</p>
            <p class="text">Hours</p>
        </div>
        <div class="block">
            <p class="digit">{{ timeRemaining.minutes | two_digits }}</p>
            <p class="text">Minutes</p>
        </div>
        <div class="block">
            <p class="digit">{{ timeRemaining.seconds | two_digits }}</p>
            <p class="text">Seconds</p>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    export default{
        data(){
            return{
              timeRemaining: {}
            }
        },
        props: ['tripDate'],
        computed: {
        },
        components:{
        },
        created(){
            window.setInterval(() => {
              this.timeRemaining = this.getTimeRemaining(this.tripDate)
            }, 1000)
        },
        methods: {
            getTimeRemaining(endtime) {
                const startTime = new Date();
                const total = Date.parse(endtime) - Date.parse(startTime);
                const seconds = Math.floor((total / 1000) % 60).toString();
                const minutes = Math.floor((total / 1000 / 60) % 60).toString();
                const hours = Math.floor((total / (1000 * 60 * 60)) % 24).toString();
                const days = Math.floor(total / (1000 * 60 * 60 * 24)).toString();
                return {
                  'total': total,
                  'days': days,
                  'hours': hours,
                  'minutes': minutes,
                  'seconds': seconds
                };
            }
        }
    }

    Vue.filter('two_digits', function (value) {
      if (value) {
        if(value.toString().length <= 1)
        {
          return "0"+value.toString();
        }
        return value.toString();
      }
    });


</script>

<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:400|Roboto:100);

    #countdown {
        align-items: center;
        bottom: 0;
        background-color: #34495e;
        display: flex;
        justify-content: center;
        left: 0;
        position: absolute;
        right: 0;
        top:0;
    }

    .block {
        display: flex;
        flex-direction: column;
        margin: 20px;
    }

    .text {
        color: #1abc9c;
        font-size: 40px;
        font-family: 'Roboto Condensed', serif;
        font-weight: 40;
        margin-top:10px;
        margin-bottom: 10px;
        text-align: center;
    }

    .digit {
        color: #ecf0f1;
        font-size: 150px;
        font-weight: 100;
        font-family: 'Roboto', serif;
        margin: 10px;
        text-align: center;
    }
</style>
