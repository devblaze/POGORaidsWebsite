@extends('layouts.app')

@section('content')
    {{--    <div id="test">
            @{{ user.name }}
        </div>
        <br/>
        <?php
        $time = Carbon\Carbon::now();
        $start_date = date_create('2020-08-08 02:40 GMT +2');
        $date = now()->toDateTime();

        $sec = 10;
        $min = 10;
        $hours = 0;
        $date->sub(new DateInterval('PT' . $hours . 'H' . $min . 'M' . $sec . 'S'));

        echo $time->toDateTimeString();
        echo '<br/>';
        echo '<br/>';
        echo $date->format('Y-m-d H:i:s') . "\n";
        echo '<br/>';
        echo '<br/>';
        echo $start_date->format('Y-m-d H:i:s');
        ?>
        <input class="slider is-fullwidth" step="1" min="0" max="100" value="50" type="range">--}}
    {{--    <input class="slider is-fullwidth" step="1" min="0" max="100" value="50" type="range">
        <div style="text-align: center;">
            <input class="slider is-fullwidth" step="1" min="0" max="100" value="50" type="range">
            <div class="field">
                <label for="switchRoundedOutlinedSuccess">Not Weather Boosted </label>
                <input id="switchRoundedOutlinedSuccess" type="checkbox" name="switchRoundedOutlinedSuccess" class="switch is-rounded is-outlined is-success">
                <label for="switchRoundedOutlinedSuccess">Weather Boosted</label>
            </div>
        </div>--}}
    <div class="column">

    </div>
    <div class="column">
        <div class="box">

            <h1 class="title">Create New Raid</h1>
            <hr>
            <form method="POST" action="{{ route('raid_create') }}">
                @csrf

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">Pokemon Name:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <div class="select @error('pokemon_id') is-danger @enderror">

                                            <select id="pokemon_id" name="pokemon_id">
                                                <option selected value="">Select..</option>
                                                @foreach($pokemons as $pokemon)
                                                    @if($pokemon->tier == 5)
                                                        <option value="{{ $pokemon->id }}">{{ $pokemon->name }} - Tier 5</option>
                                                    @endif
                                                    @if($pokemon->tier == 4)
                                                        <option value="{{ $pokemon->id }}">{{ $pokemon->name }} - Tier 4</option>
                                                    @endif
                                                    @if($pokemon->tier == 3)
                                                        <option value="{{ $pokemon->id }}">{{ $pokemon->name }} - Tier 3</option>
                                                    @endif
                                                    @if($pokemon->tier == 2)
                                                        <option value="{{ $pokemon->id }}">{{ $pokemon->name }} - Tier 2</option>
                                                    @endif
                                                    @if($pokemon->tier == 1)
                                                        <option value="{{ $pokemon->id }}">{{ $pokemon->name }} - Tier 1</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('pokemon_id')
                                        <p class="help is-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--
                <div class="columns">
                    <div class="column is-full">
                        <div class="columns is-centered">
                            <div class="control">
                                <label class="radio">
                                    <figure class="image is-64x64">
                                        <img src="/images/small_zapdos.png">
                                    </figure>
                                    <input type="radio" name="answer">
                                </label>
                                <label class="radio">
                                    <figure class="image is-64x64">
                                        <img src="/images/small_onix.png">
                                    </figure>
                                    <input type="radio" name="answer">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
--}}

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                {{--                        Line left half--}}
                                <label class="label">Minutes left: </label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
                                {{--                        Line right half--}}
                                <div class="control">
                                    <div class="control">
                                        <input id="minutes" name="minutes" class="input @error('minutes') is-danger @enderror" type="text" placeholder="Minutes">
                                    </div>
                                    @error('minutes')
                                    <p class="help is-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">Available Invites:</label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
                                <div class="control">
                                    <div class="control">
                                        <input id="invites" name="invites" class="input @error('invites') is-danger @enderror" type="text" value="5" placeholder="Max Value is 20">
                                    </div>
                                    @error('invites')
                                    <p class="help is-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="columns" style="padding: 5%">
                    <div class="column is-half">
                        <div class="field">
                            <input id="hatched" type="checkbox" name="hatched" class="switch is-rounded is-outlined is-success">
                            <label for="hatched">Before Hatch</label>
                            @error('hatched')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="column is-half">
                        <div class="field">
                            <input id="weather_boost" type="checkbox" name="weather_boost" class="switch is-rounded is-outlined is-success">
                            <label for="weather_boost">Weather Boosted </label>
                            @error('weather_boost')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <div class="control">
                            {{--                            <input id="trainer_id" name="trainer_id" type="hidden" value="{{ Auth::user()->trainer()->value('id') }}">--}}
                            <input id="trainer_id" name="trainer_id" type="hidden" value="{{ auth()->user()->trainer->id }}">
                            @error('trainer_id')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                            <button type="submit" class="button is-large is-fullwidth is-success">Start Raid</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="column">

    </div>
@endsection
