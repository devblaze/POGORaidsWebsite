<template>
    <div>
<!--        {{ minutes < 10 ? ("0" + minutes) : minutes }}:{{ seconds < 10 ? ("0" + seconds) : seconds }}-->
        {{ timer }}
    </div>
</template>

<script>
export default {
    props: {
        seconds: Number
    },

    data() {
        return {
            countDown: this.seconds,
            countDownTimer() {
                if (this.countDown > 0) {
                    setTimeout(() => {
                        this.countDown -= 1
                        this.countDownTimer()
                    }, 1000)
                }
            }
        }
    },

    created() {
        this.countDownTimer()
        // window.setInterval(autoIncrementTimer, 1000)
    },

    computed: {
        timer: function () {
            let minutes = Math.floor(this.countDown / 60)
            let sec = this.countDown - minutes * 60
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
</script>
