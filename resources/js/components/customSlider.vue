<template>
    <div class="tier">
        <input type="range" :min="sliderMin" :max="sliderMax" :step="sliderStep" v-model="slider" v-on:change="raidIcon">
        <div style="text-align: center; font-weight: bold">
            {{ slider }}
            <span class="icon is-small is-centered" v-for="slider in 5"><img src="/images/icon_raid_level.png"></span>
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return{
            sliderStep: 1,
            sliderMin: 1,
            sliderMax: 5,
            slider: 1,
            images: "",
            sliderImage: 0,
        }
    },

    methods: {
        raidIcon: function () {
            console.log('Slider Value changed!')
        }
    },
}
</script>
