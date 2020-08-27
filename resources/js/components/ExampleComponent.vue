<template>
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <slot></slot>
            </p>
            <a class="card-header-icon" aria-label="more options" @click="toggle = !toggle">
                <span class="icon" v-show="toggle">
                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                </span>
                <span class="icon" v-show="!toggle">
                    <i class="fas fa-angle-up" aria-hidden="true"></i>
                </span>
            </a>
        </header>
<!--        <transition name="fade">
            <div class="card-content" v-if="show">
                <div class="content" v-if="show">
                    <slot v-if="show"></slot>
                </div>
            </div>
        </transition>-->

        <div class="card-content" v-show="toggle">
            <div class="content">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<style>
.fade-enter-active, .fade-leave-active {
    transition: height 2s;
    transition-timing-function: ease;
}

.fade-enter, fade-leave-to {
    opacity: 0;
}
</style>

<script>
export default {

    data() {
        return {
            toggle: true
        }
    }
}
</script>
