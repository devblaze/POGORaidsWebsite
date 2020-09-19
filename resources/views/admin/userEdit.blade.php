@extends('layouts.app')

@section('admin')
    <div class="container">
        <div class="columns">
            @include('admin.menu')
            <form method="POST" target="{{ route('home') }}">
                @csrf
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="10">Configuring User {{ $user->username }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input class="input" type="text" name="username" value="{{ $user->username }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email:
                        </td>
                        <td><input class="input" type="text" name="email" value="{{ $user->email }}"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td>
                            <input class="input" type="password" name="password" placeholder="Password" value="******">
                        </td>
                    </tr>
                    <tr>
                        <td>Access Level:</td>
                        <td>
                            <div class="select">
                                <select name="accessLevel">
                                    @foreach(App\AccessLevel::all() as $accessLevel)
                                        <option value="{{ $accessLevel->id }}">{{ $accessLevel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <input class="button is-primary is-large" type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
@endsection
