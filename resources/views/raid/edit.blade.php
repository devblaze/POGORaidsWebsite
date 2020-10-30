@extends('layouts.app')

@section('content')
    <form method="POST" target="{{ route('raid_update') }}">
        @csrf
        <table class="table">
            <thead>
            <tr>
                <th colspan="10">Configuring User {{ $raid->pokemon->name }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Pokemon:</td>
                <td>
                    <div class="select @error('pokemon_id') is-danger @enderror">

                        <select id="pokemon_id" name="pokemon_id">
                            @foreach($pokemons as $pokemon)
                                @if($pokemon->id == $raid->pokemon_id)
                                    <option value="{{ $pokemon->id }}" selected>{{ $pokemon->name }} - Tier {{ $pokemon->tier }}</option>
                                @else
                                    @if($pokemon->tier == 5)
                                        <option value="{{ $pokemon->id }}">{{ $pokemon->name }} - Tier {{ $pokemon->tier }}</option>
                                    @endif
                                    @if($pokemon->tier == 4)
                                        <option value="{{ $pokemon->id }}">{{ $pokemon->name }} - Tier {{ $pokemon->tier }}</option>
                                    @endif
                                    @if($pokemon->tier == 3)
                                        <option value="{{ $pokemon->id }}">{{ $pokemon->name }} - Tier {{ $pokemon->tier }}</option>
                                    @endif
                                    @if($pokemon->tier == 2)
                                        <option value="{{ $pokemon->id }}">{{ $pokemon->name }} - Tier {{ $pokemon->tier }}</option>
                                    @endif
                                    @if($pokemon->tier == 1)
                                        <option value="{{ $pokemon->id }}">{{ $pokemon->name }} - Tier {{ $pokemon->tier }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Invites:
                </td>
                <td><input class="input" type="text" name="email" value="{{ $raid->invites }}" placeholder="Current Invites"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <div class="field">
                        <input id="weather_boost" type="checkbox" name="weather_boost" class="switch is-rounded is-outlined is-success">
                        <label for="weather_boost">Weather Boosted </label>
                        @error('weather_boost')
                        <p class="help is-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="buttons">
            <button class="button is-primary is-large" type="submit" name="submit">
                <span class="icon is-small"><i class="fas fa-check"></i></span>
                <span>Update</span>
            </button>
            <button class="button is-danger is-large">
                <span>Delete</span>
                <span class="icon is-small"><i class="fas fa-times"></i></span>
            </button>
        </p>
    </form>
@endsection
