@extends('layouts.app')

@section('content')
    <div class="column">

    </div>
    <div class="column">
        <div class="box">

            <h1 class="title">Register</h1>
            <hr>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">Username:</label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
                                <div class="control">
                                    <div class="control">
                                        <input id="username" name="username" class="input @error('username') is-danger @enderror" type="text" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    </div>
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

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">E-Mail Address:</label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
                                <div class="control">
                                    <div class="control">
                                        <input id="email" name="email" class="input @error('email') is-danger @enderror" type="text" value="{{ old('email') }}" required autocomplete="email">
                                    </div>
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

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">Password:</label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
                                <div class="control">
                                    <div class="control">
                                        <input id="password" name="password" class="input @error('password') is-danger @enderror" type="password" required autocomplete="new-password">
                                    </div>
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

                <div class="columns">
                    <div class="column is-full">
                        <div class="columns">
                            <div class="column is-half" style="display: flex;justify-content: center;align-items: center;">
                                <label class="label">Confirm Password:</label>
                            </div>
                            <div class="column is-half" style="display: flex; justify-content: center;">
                                <div class="control">
                                    <div class="control">
                                        <input id="passowrd-confirm" name="password_confirmation" class="input @error('password') is-danger @enderror" type="password" required autocomplete="new-password">
                                    </div>
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

                <div class="columns">
                    <div class="column">
                        <div class="control">
                            <button type="submit" class="button is-large is-fullwidth is-success">Create Account</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="column">

    </div>
@endsection
