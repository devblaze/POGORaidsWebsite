@extends('layouts.app')

@section('content')
    <h1>This is the Home Page</h1>
    <br/>
    {{ auth()->user()->trainer->id }}
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
@endsection
