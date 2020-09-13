<template>
    <div>
        <!--        {{ minutes < 10 ? ("0" + minutes) : minutes }}:{{ seconds < 10 ? ("0" + seconds) : seconds }}-->
        {{ timer }} / {{ id }}

    </div>
</template>

<script>
let interval = null;
export default {
    props: {
        id: Number
    },
    data() {
        return {
            seconds: Number
        }
    },
    created() {
        this.getSeconds(this.id)
        this.countDownTimer()
        // window.setInterval(autoIncrementTimer(), 1000)
    },
    watch: {
        id: 'getSeconds'
    },
    methods: {
        /**
         * The count down timer for seconds.
         */
        countDownTimer() {
            interval = setInterval(() => {
                if (this.seconds > 0){
                    this.seconds--
                } else {
                    clearInterval(interval)
                }
/*                this.seconds--
                if (this.seconds <= 0){
                    clearInterval(interval)
                }*/
            }, 1000)
            /*if (this.seconds > 0) {
                setTimeout(() => {
                    this.seconds -= 1
                    this.countDownTimer()
                }, 1000)
            }*/
        },

        /**
         * Get the calculated seconds from the backend with and API call.
         *
         * @param {int} id
         */
        getSeconds(id) {
            axios
                .get('api/raids/seconds?id=' + id)
                .then((response) => {
                    this.seconds = response.data
                    // this.countDownTimer()
                })
                .catch(() => {
                    console.log('Something went wrong while fetching the seconds from Raid: ' + id);
                })
        }
    },
    computed: {
        /**
         * The computed property for a better seconds display. (minutes:seconds)
         * (Not optimal solution needs fix later)
         *
         * @returns {string}
         */
        timer: function () {
            let minutes = Math.floor(this.seconds / 60)
            let sec = this.seconds - minutes * 60
            let hours = Math.floor(minutes / 60)
            if (hours != 0){
                let minutess = minutes - hours * 60
                if (hours < 10){
                    hours = "0" + hours
                }
                if (minutess < 10) {
                    minutess = "0" + minutess
                }
                if (sec < 10) {
                    sec = "0" + sec
                }
                return hours + ":" + minutess + ":" + sec
            } else {
                if (minutes < 10) {
                    minutes = "0" + minutes
                }
                if (sec < 10) {
                    sec = "0" + sec
                }
                return minutes + ":" + sec
            }
        }
    }

}
</script>
