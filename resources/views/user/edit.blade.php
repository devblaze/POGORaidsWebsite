@extends('layouts.app')

@section('content')
    <div class="column">

    </div>
    <div class="column">
        <div class="box">

            <h1 class="title">Account Settings</h1>
            <hr>
            <form method="POST" action="{{ route('user_update') }}">
                @csrf
                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">Username:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <input id="username" name="username" class="input @error('username') is-danger @enderror" type="text" placeholder="Your Username" value="{{ $user->username }}" readonly>
                                        @error('username')
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
                                <label class="label">E-mail:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <input id="email" name="email" class="input @error('email') is-danger @enderror" type="text" placeholder="Account Email" value="{{ $user->email }}" readonly>
                                        @error('email')
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
                                <label class="label">*Current Password:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <input id="password" name="password" class="input @error('password') is-danger @enderror" type="password" placeholder="*Required">
                                        @error('password')
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
                                <label class="label">New Password:</label>
                            </div>
                            <div class="column is-half">
                                <div style="text-align: center;">
                                    <div class="control">
                                        <input id="new_password" name="new_password" class="input @error('new_password') is-danger @enderror" type="password" placeholder="Change your password">
                                        @error('new_password')
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
                            <button type="submit" class="button is-large is-fullwidth is-info">Update</button>
                        </div>
                    </div>
                </div>
            </form>
            <center>
            @if (Session::has('success'))
                <p class="help is-success">
                    {!! Session::get('success') !!}
                </p>
            @endif
            @if (Session::has('failure'))
                <p class="help is-danger">
                    {!! Session::get('failure') !!}
                </p>
            @endif
            </center>
        </div>
    </div>
    <div class="column">

    </div>
@endsection
