@extends('layouts.app')

@section('content')
    <div class="column">

    </div>
    <div class="column">
        <div class="box">

            <h1 class="title">Add New Pokemon</h1>
            <hr>
            <form method="POST" action="{{ route('raid_create') }}">
                @csrf

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">PokeDex ID: </label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
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
                                <label class="label">Pokemon Name: </label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
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
                                <label class="label">Pokemon Tier:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <div class="select @error('pokemon_id') is-danger @enderror">

                                            <select id="pokemon_id" name="pokemon_id">
                                                <option selected value="">Select..</option>
                                                <option value="1">Tier 1</option>
                                                <option value="2">Tier 2</option>
                                                <option value="3">Tier 3</option>
                                                <option value="4">Tier 4</option>
                                                <option value="5">Tier 5</option>
                                                <option value="6">Mega Evolution</option>
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

{{--                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex; justify-content: center; align-items: center;">
                                --}}{{--                        Line left half--}}{{--
                                <label class="label">Pokemon Tier:</label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
                                --}}{{--                        Line right half--}}{{--
                                --}}{{--                            <input step="1" min="1" max="5" value="1" type="range">--}}{{--
                                <customslider name="tier2"></customslider>
                                <input type="range" min="1" max="5" value="1" name="tier">
                                @error('tier')
                                <p class="help is-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>--}}

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">Min CP: </label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
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
                                <label class="label">Max CP: </label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
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
                                <label class="label">Boosted Min CP: </label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
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
                                <label class="label">Boosted Max CP: </label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
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

                <br/>
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
