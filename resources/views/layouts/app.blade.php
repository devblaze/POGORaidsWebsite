<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/eee00f29d4.css">--}}
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
@include('layouts.navbar')
@yield('modal')
{{--<div class="container" style="margin-left: 5px; margin-right: 5px; margin-top: 5px;">--}}
<div class="container" style="max-width: 85%; padding-top: 25px" id="app">
    <div class="columns">
        @yield('content')
    </div>
</div>
{{--            @if (session('status'))
                <div role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
                <br/>

                {{ auth()->user()->id }}
                <br/>
                <br/>
                Code: {{ auth()->user()->trainer()->pluck('code') }}
                <br/>
                <br/>
                Code: {{ auth()->user()->trainer()->value('name') }}
                <br/>
                <br/>
                Check: {{ auth()->user()->trainer->isEmpty() }}
                <br/>
                <br/>
            @if( auth()->user()->trainer->isEmpty())
                    It's empty
                @else
                    It's not empty
                @endif--}}
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
