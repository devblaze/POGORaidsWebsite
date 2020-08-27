<template>
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <slot></slot>
            </p>
            <a class="card-header-icon" aria-label="more options" @click="show = !show">
                <span class="icon" v-show="toggle">
                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                </span>
                <span class="icon" v-show="!toggle">
                    <i class="fas fa-angle-up" aria-hidden="true"></i>
                </span>
            </a>
        </header>
        <transition name="fadce">
            <p v-if="show">test</p>
        </transition>

<!--        <div class="card-content" v-show="toggle">
            <div class="content">
                <slot></slot>
            </div>
        </div>-->
    </div>
</template>

<style>
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}

.fade-enter, fade-leave-to {
    opacity: 0;
}
</style>

<script>
export default {

    data() {
        return {
            show: true,
            toggle: true
        }
    }
}
</script>
