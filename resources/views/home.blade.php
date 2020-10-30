@extends('layouts.app')

@section('content')
    <div class="columns is-multiline">
        <div class="column is-full">
            <section class="hero">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Help Us Be Part of our Team
                        </h1>
                        <h2 class="subtitle">
                            Here is our listed Pokemon so far..
                        </h2>
                    </div>
                </div>
            </section>
        </div>

        @foreach($pokemons as $pokemon)
            <div class="column is-one-quarter">
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-8">
                        <div class="tile">
                            <div class="tile is-parent is-vertical">
                                <article class="tile is-child notification">
                                    <p class="title">{{ $pokemon->name }}</p>
                                    <p class="subtitle">{{ $pokemon->dex_id }}</p>
                                    <figure class="image is-4by3">
                                        <img src="images\icon_{{ strtolower($pokemon->name) }}.jpg">
                                    </figure>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{--    @auth()
        {{ auth()->user()->trainer->id }}
        @endauth--}}
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
