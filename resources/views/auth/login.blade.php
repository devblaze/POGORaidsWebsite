@extends('layouts.app')

@section('modal')
    <form class="modal is-active" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">{{ __('Login') }}</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label" for="username">{{ __('Username') }}</label>
                    <div class="control has-icons-left has-icons-right">
                        <input id="username" name="username" value="{{ old('username') }}" class="input @error('username') is-danger @enderror" type="text" placeholder="Your username" required autocomplete="username" autofocus>
                        <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
                        <span class="icon is-small is-right"><i class="fas fa-check"></i></span>
                        @error('username')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <br/>
                    <div class="field">
                        <label class="label" for="password">{{ __('Password') }}</label>
                        <div class="control has-icons-left">
                            <input id="password" name="password" class="input @error('password') is-danger @enderror" type="password" placeholder="***********" required autocomplete="current-password">
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                            @error('password')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

            </section>
            <footer class="modal-card-foot">
                <div class="field is-grouped is-grouped-right">
                    <div class="control">
                        <button class="button is-primary" type="submit">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="button is-light" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </footer>
        </div>
    </form>
    {{--Old view down here --}}
    {{--    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="username" class="label">{{ __('Username') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="input @error('username') is-danger @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="label">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="button is-success">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
@endsection
