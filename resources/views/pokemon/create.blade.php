@extends('layouts.app')

@section('content')
    <div class="column">

    </div>
    <div class="column">
        <div class="box">

            <h1 class="title">Add New Pokemon</h1>
            <hr>
            <form method="POST" action="{{ route('pokemon_create') }}">
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
                                        <input id="dex_id" name="dex_id" class="input @error('dex_id') is-danger @enderror" type="text" placeholder="Max 600">
                                    </div>
                                    @error('dex_id')
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
                                        <input id="name" name="name" class="input @error('name') is-danger @enderror" type="text" placeholder="Pokemon Name">
                                    </div>
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

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">Pokemon Tier:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <div class="select @error('tier') is-danger @enderror">

                                            <select id="tier" name="tier">
                                                <option selected value="">Select..</option>
                                                <option value="1">Tier 1</option>
                                                <option value="2">Tier 2</option>
                                                <option value="3">Tier 3</option>
                                                <option value="4">Tier 4</option>
                                                <option value="5">Tier 5</option>
                                                <option value="6">Mega Evolution</option>
                                            </select>
                                        </div>
                                        @error('tier')
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
                                <label class="label">Min CP: </label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
                                <div class="control">
                                    <div class="control">
                                        <input id="min_cp" name="min_cp" class="input @error('min_cp') is-danger @enderror" type="text" placeholder="Minimum CP">
                                    </div>
                                    @error('min_cp')
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
                                        <input id="max_cp" name="max_cp" class="input @error('max_cp') is-danger @enderror" type="text" placeholder="Maximum CP">
                                    </div>
                                    @error('max_cp')
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
                                        <input id="boosted_min_cp" name="boosted_min_cp" class="input @error('boosted_min_cp') is-danger @enderror" type="text" placeholder="Boosted Minimum CP">
                                    </div>
                                    @error('boosted_min_cp')
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
                                        <input id="boosted_max_cp" name="boosted_max_cp" class="input @error('boosted_max_cp') is-danger @enderror" type="text" placeholder="Boosted Maximum CP">
                                    </div>
                                    @error('boosted_max_cp')
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
                        <div class="file has-name is-right">
                            <label class="file-label">
                                <input class="file-input" type="file" name="pokemon_image" id="pokemon_image">
                                <span class="file-cta">
                                  <span class="file-icon"><i class="fas fa-upload"></i></span>
                                  <span class="file-label">Choose a file…</span>
                                </span>
                                <span class="file-name">icon_{Pokemon Name}.png</span>
                            </label>
                        </div>
                    </div>
                </div>

                <br/>
                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <button type="submit" class="button is-large is-fullwidth is-info">+ Add Pokemon</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="column">

    </div>
@endsection
