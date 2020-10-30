@extends('layouts.app')

@section('content')
    @if(auth()->user()->trainer === null)
    <div class="column">

    </div>
    <div class="column">
        <div class="box">

            <h1 class="title">Add new Trainer</h1>
            <hr>
            <form method="POST" action="{{ route('trainer_create') }}">
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
                                        <input id="name" name="name" class="input @error('name') is-danger @enderror" type="text" placeholder="Trainer Name">
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
                                        <input id="code" name="code" class="input @error('code') is-danger @enderror" type="text" placeholder="0000 0000 0000 0000">
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
                                {{--                        Line left half--}}
                                <label class="label">*Trainer Level:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <input id="level" name="level" class="input @error('level') is-danger @enderror" type="text" placeholder="Max 40">
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
                                            <option selected value="">Select..</option>
                                            <option>Mystic (Blue)</option>
                                            <option>Instinct (Yellow)</option>
                                            <option>Valor (Red)</option>
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
                                {{--                        Line left half--}}
                                <label class="label">Trainer Pokedex:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <input id="pokedex" name="pokedex" class="input @error('pokedex') is-danger @enderror" type="text" placeholder="Max value is 645">
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
                            {{--                            <input id="trainer_id" name="trainer_id" type="hidden" value="{{ Auth::user()->trainer()->value('id') }}">--}}
                            {{--                            <input id="user_id" name="user_id" type="hidden" value="{{ auth()->user()->id }}">
                                                        @error('user_id')
                                                        <p class="help is-danger">
                                                            {{ $message }}
                                                        </p>
                                                        @enderror--}}
                            <button type="submit" class="button is-large is-fullwidth is-success">Create Trainer</button>
                            @error('errors')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="column">

    </div>
    @endif
@endsection
