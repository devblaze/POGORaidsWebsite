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
{{--        <link rel="stylesheet" href="https://use.fontawesome.com/eee00f29d4.css">--}}
</head>
<body>
@include('layouts.navbar')
@yield('modal')
@yield('admin')
{{--<div class="container" style="margin-left: 5px; margin-right: 5px; margin-top: 5px;">--}}
<div class="container" style="max-width: 85%; padding-top: 25px" id="app">
    <div class="columns">
        @yield('content')
    </div>
</div>
{{--@if (session('status'))
    <div role="alert">
        {{ session('status') }}
    </div>
@endif
{{ __('You are logged in!') }}
{{ auth()->user()->id }}
Code: {{ auth()->user()->trainer()->pluck('code') }}
Code: {{ auth()->user()->trainer()->value('name') }}
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
<script src="https://kit.fontawesome.com/a5dfb946df.js" crossorigin="anonymous"></script>
</body>
</html>
