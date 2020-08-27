@extends('layouts.app')

@section('content')
    <div class="test">
        @{{ user.name }}
    </div>
    <div id="app">
        <div class="outer-container">
            <div class="inner-container">
                <h1>Not Fancy Countdown Timer</h1>
                <div class="countdown">
                    <h2>
                        @{{ timeLeft }}
                    </h2>
                    <h3>Countdown ends at <span>@{{ endTime }}</span></h3>
                </div>

                <ul class="columns is-mobile is-centered">
                    <li v-for="(time, index) in times" :key="index" class="column time">
                        <a v-on:click.prevent="setTime(time.sec)" :class="[
                'button',
                'is-link',
                {'is-active': time.sec === selectedTime && endTime !== 0 }
              ]">
                            @{{ time.display }}
                        </a>
                    </li>
                </ul>

                <!-- Social Media Footer -->
                <div class="social-media-footer">
                    <!-- GitHub -->
                    <div class="github-code">
                        <i class="fa fa-github" aria-hidden="true"></i>
                        <a href="https://github.com/samanthaming/not-fancy-countdown-timer" target="_blank">
                            View code on GitHub
                        </a>
                    </div>
                    <div class="columns is-mobile social-columns">
                        <div class="column">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                            <a href="https://twitter.com/samantha_ming" target="_blank">samantha_ming</a>
                        </div>
                        <div class="column">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <a href="https://www.facebook.com/hisamanthaming" target="_blank">hi.samanthaming</a>
                        </div>
                        <div class="column">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                            <a href="https://www.instagram.com/samanthaming/" target="_blank">samanthaming</a>
                        </div>
                    </div>
                </div>
                <!--end social media-->
            </div>
        </div>
    </div>
@endsection
