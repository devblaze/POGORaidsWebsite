@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="columns">
            @include('admin.menu')
            {{ $trainers->links() }}
            <br/>
            <table class="table is-hoverable">
                <thead>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Code</th>
                <th>Level</th>
                <th>Team</th>
                <th>Pokedex</th>
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
                @foreach($trainers as $trainer)
                    <tr>
                        <th>{{ $trainer->id }}</th>
                        <td>{{ $trainer->user->username }}</td>
                        <td>{{ $trainer->name }}</td>
                        <td>{{ $trainer->code }}</td>
                        <td>{{ $trainer->level }}</td>
                        <td>{{ $trainer->team}}</td>
                        <td>{{ $trainer->pokedex }}</td>
                        <td>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-save" title="Edit Trainer">&nbsp;</i>
                            </a>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-times" title="Delete Trainer">&nbsp;</i>
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
