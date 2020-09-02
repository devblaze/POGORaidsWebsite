<template>

</template>

<script>
export default {
    data() {
        return {
            name: '',
            tier: '',
            time_left: '',
            invites: '',
            status: '',
            weather_boosted: ''
        }
    },

    onSubmit(){
        this.Form.submit('post', '/raids/create');
    }
}
</script>
