<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ route('home') }}">Home</a>
            <a class="navbar-item" href="{{ route('raid_index') }}"><i class="fas fa-dragon">&nbsp;</i>Raids</a>
            <a class="navbar-item" href="{{ route('raid_create') }}"><i class="fas fa-plus-circle">&nbsp;</i>Create Raid</a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <div class="field is-grouped">
                        @guest
                            <p class="control">
                                <a class="button is-small is-info is-outlined" href="{{ route('login') }}">
										<span class="icon">
											<i class="fa fa-user"></i>
										</span>
                                    <span>Login</span>
                                </a>
                            </p>
                            @if (Route::has('register'))
                                <p class="control">
                                    <a class="button is-small" href="{{ route('register') }}">
										<span class="icon">
											<i class="fa fa-user-plus"></i>
										</span>
                                        <span>
											Register
										</span>
                                    </a>
                                </p>
                            @endif
                        @else
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                    {{--                                <figure class="image is-24x24" style="margin-right: 5px">
                                                                        <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                                                                    </figure>--}}
                                    <i class="fas fa-user">&nbsp;</i>{{ Auth::user()->username }}
                                </a>

                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="{{ route('trainer_create') }}">
                                        <i class="fas fa-user-plus">&nbsp;</i>Add Trainer
                                    </a>
                                    <a class="navbar-item">
                                        <i class="fas fa-user-edit">&nbsp;</i>Edit Trainer
                                    </a>
                                    <a class="navbar-item">
                                        <i class="fas fa-user-clock">&nbsp;</i>Trainer History
                                    </a>
                                    <hr class="navbar-divider">
                                    <a class="navbar-item">
                                        <i class="fas fa-trophy">&nbsp;</i>VIP&nbsp;<font color="green">(Active)</font>
                                    </a>
                                    <hr class="navbar-divider">
                                    <a class="navbar-item">
                                        <i class="fas fa-bug" aria-hidden="true">&nbsp;</i>Report a bug
                                    </a>
                                    <hr class="navbar-divider">
                                    <a class="navbar-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt" aria-hidden="true">&nbsp;</i>{{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
