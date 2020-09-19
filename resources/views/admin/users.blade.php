@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="columns">
            @include('admin.menu')
            {{ $users->links() }}
            <br/>
            <table class="table is-hoverable">
                <thead>
                <th>ID</th>
                <th>Username</th>
                <th>E-Mail</th>
                <th>Created At</th>
                <th>Access Level</th>
                <th>Actions</th>
                </thead>
                <tbody>
                <tr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <td colspan="2">
                            <div class="control">
                                <input class="input is-hovered" type="text" placeholder="Username">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input is-hovered" type="text" placeholder="Email">
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
                            <button class="button is-success" type="submit">
                            <span class="icon is-small">
                              <i class="fas fa-user-plus"></i>
                            </span>
                                <span>Create</span>
                            </button>
                        </td>
                    </form>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><center>{{ $user->AccessLevel->name }}</center></td>
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
