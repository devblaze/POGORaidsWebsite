@extends('layouts.app')

@section('content')
    <div class="column">

    </div>
    <div class="column">
        <div class="box">

            <h1 class="title">Edit Trainer</h1>
            <hr>
            <form method="POST" action="{{ route('trainer_update') }}">
                @csrf
                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">*Trainer Name:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <input id="name" name="name" class="input @error('name') is-danger @enderror" type="text" placeholder="Trainer Name" value="{{ $trainer->name }}">
                                        @error('name')
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

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex; justify-content: center; align-items: center;">
                                {{--                        Line left half--}}
                                <label class="label">*Trainer Code:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <input id="code" name="code" class="input @error('code') is-danger @enderror" type="text" placeholder="0000 0000 0000 0000" value="{{ $trainer->code }}">
                                        @error('code')
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

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex; justify-content: center; align-items: center;">
                                <label class="label">*Trainer Level:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <input id="level" name="level" class="input @error('level') is-danger @enderror" type="text" placeholder="Max 40" value="{{ $trainer->level }}">
                                        @error('level')
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

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">*Trainer Team:</label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
                                <div class="control">
                                    <div class="select @error('team') is-danger @enderror">
                                        <select id="team" name="team">
                                            <option @if($trainer->team == "Mystic (Blue)") selected @endif>Mystic (Blue)</option>
                                            <option @if($trainer->team == "Instinct (Yellow)") selected @endif>Instinct (Yellow)</option>
                                            <option @if($trainer->team == "Valor (Red)") selected @endif>Valor (Red)</option>
                                        </select>
                                    </div>
                                    @error('team')
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
                            <div class="column is-half" style="display: flex; justify-content: center; align-items: center;">
                                <label class="label">Trainer Pokedex:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <input id="pokedex" name="pokedex" class="input @error('pokedex') is-danger @enderror" type="text" placeholder="Max value is 645" value="{{ $trainer->pokedex }}">
                                        @error('pokedex')
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
                <br/>

                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <button type="submit" class="button is-large is-fullwidth is-info">Update Trainer</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="column">

    </div>
@endsection
