@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="columns">
            @include('admin.menu')
            {{ $trainers->links() }}
            <br/>
            <table class="table is-hoverable is-fullwidth">
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
                        <div class="select">
                            <select name="accessLevel">
                                @foreach(App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Name">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Code">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Level">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Team">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input is-hovered" type="text" placeholder="Pokedex">
                        </div>
                    </td>
                    <td>
                        <button class="button is-success">
                            <span class="icon is-small">
                              <i class="fas fa-user-plus"></i>
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
                            <a href="/admin/users/{{ $user->id }}/edit">
                                <i class="fas fa-user-cog" title="Edit User">&nbsp;</i>
                            </a>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-ban" title="Ban User">&nbsp;</i>
                            </a>
                            <a href="{{ route('admin') }}">
                                <i class="fas fa-user-alt-slash" title="Delete User">&nbsp;</i>
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
