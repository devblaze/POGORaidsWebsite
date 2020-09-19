@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="columns">
            @include('admin.menu')
            {{ $raids->links() }}
            <br/>
            <table class="table is-hoverable">
                <thead>
                <th>ID</th>
                <th>Trainer</th>
                <th>Name</th>
                <th>Tier</th>
                <th>Invites</th>
                <th>Weather Boost</th>
                <th>Actions</th>
                </thead>
                <tbody>
                <tr>
                    <td colspan="2">
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Name">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Label">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Password">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Access Level">
                        </div>
                    </td>
                    <td>
                        <button class="button is-success">
                            <span class="icon is-small">
                              <i class="fas fa-users"></i>
                            </span>
                            <span>Create</span>
                        </button>
                    </td>
                </tr>
                @foreach($raids as $raid)
                    <tr>
                        <th>{{ $raid->id }}</th>
                        <td>{{ $raid->trainer->name }}</td>
                        <td>{{ $raid->name}}</td>
                        <td>{{ $raid->tier }}</td>
                        <td>{{ $raid->invites }}</td>
                        <td>{{ $raid->weather_boost ? 'True' : 'False' }}</td>
                        <td>{{ $raid->end_time }}</td>
                        <td>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-save" title="Save Changes">&nbsp;</i>
                            </a>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-times" title="Delete Level">&nbsp;</i>
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
