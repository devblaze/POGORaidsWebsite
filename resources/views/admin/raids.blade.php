@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="columns">
            @include('admin.menu')
            {{ $raids->links() }}
            <br/>
            <table class="table is-hoverable is-fullwidth">
                <thead>
                <th>ID</th>
                <th>Trainer</th>
                <th>Name</th>
                <th>Tier</th>
                <th>Invites</th>
                <th>Weather Boost</th>
                <th colspan="2">Created At</th>
                </thead>
                <tbody>
                <tr>
                    <td colspan="6">
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Trainer Name / Raid Name">
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
                @foreach($raids as $raid)
                    <tr>
                        <th>{{ $raid->id }}</th>
                        <td>{{ $raid->trainer->name }}</td>
                        <td>{{ $raid->pokemon->name}}</td>
                        <td>{{ $raid->pokemon->tier === 6 ? 'Mega' : $raid->pokemon->tier . ' Tier' }}</td>
                        <td>{{ $raid->invites }}</td>
                        <td>{{ $raid->weather_boost ? 'True' : 'False' }}</td>
                        <td>{{ $raid->end_time }}</td>
                        <td>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-times" title="Delete Raid">&nbsp;</i>
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
