@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="columns">
            @include('admin.menu')
            {{ $pokemons->links() }}
            <br/>
            <table class="table is-hoverable is-fullwidth">
                <thead>
                <th>ID</th>
                <th>Dex ID</th>
                <th>Name</th>
                <th>Tier</th>
                <th>Min CP</th>
                <th>Max CP</th>
                <th>Min BCP</th>
                <th>Max BCP</th>
                <th>Actions</th>
                </thead>
                <tbody>
                <tr>
                    <td colspan="7">
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Dex ID / Pokemon Name">
                        </div>
                    </td>
                    <td colspan="2" class="is-centered">
                        <button class="button is-info is-fullwidth">
                            <span class="icon is-small">
                              <i class="fas fa-search"></i>
                            </span>
                            <span>Search</span>
                        </button>
                    </td>
                </tr>
                @foreach($pokemons as $pokemon)
                    <tr>
                        <th>{{ $pokemon->id }}</th>
                        <td>{{ $pokemon->dex_id }}</td>
                        <td>{{ $pokemon->name }}</td>
                        <td>{{ $pokemon->tier }}</td>
                        <td>{{ $pokemon->min_cp }}</td>
                        <td>{{ $pokemon->max_cp }}</td>
                        <td>{{ $pokemon->boosted_min_cp }}</td>
                        <td>{{ $pokemon->boosted_max_cp }}</td>
                        <td>
                            <a class="button is-info" href="#">
                                <i class="fas fa-wrench"></i>&nbsp;Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
