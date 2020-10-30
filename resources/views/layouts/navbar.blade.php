<nav class="navbar" role="navigation" aria-label="dropdown navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="/images/logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navMenu" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ route('home') }}">Home</a>
            <a class="navbar-item" href="{{ route('raid_index') }}"><i class="fas fa-dragon">&nbsp;</i>Raids</a>
            @auth
                @if(Auth::user()->AccessLevel->id === 2)
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link"><i class="fas fa-plus-circle">&nbsp;</i>Create</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('raid_create') }}"><i class="fas fa-plus">&nbsp;</i>Create Raid</a>
                            <a class="navbar-item" href="{{ route('pokemon_create') }}"><i class="fas fa-plus">&nbsp;</i>Add Pokemon</a>
                        </div>
                    </div>
                @else
                    <a class="navbar-item" href="{{ route('raid_create') }}"><i class="fas fa-plus">&nbsp;</i>Create Raid</a>
                @endif
            @endauth
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

                                <div class="navbar-dropdown is-right">
                                    @if(Auth::user()->AccessLevel->id === 2)
                                        <a class="navbar-item" href="{{ route('admin') }}">
                                            <i class="fas fa-toolbox">&nbsp;</i>Admin Panel
                                        </a>
                                        <hr class="navbar-divider">
                                    @endif
                                    <a class="navbar-item" href="{{ route('user_edit', Auth::user()->username) }}">
                                        <i class="fas fa-cog" aria-hidden="true">&nbsp;</i>Settings
                                    </a>
                                    <a class="navbar-item">
                                        <i class="fas fa-trophy">&nbsp;</i>VIP&nbsp;<span style="color: green; ">(Active)</span>
                                    </a>
                                    <hr class="navbar-divider">
                                    @if(Auth::user()->trainer === null)
                                        <a class="navbar-item" href="{{ route('trainer_create') }}">
                                            <i class="fas fa-user-plus">&nbsp;</i>Add Trainer
                                        </a>
                                    @endif
                                    @if(Auth::user()->trainer !== null)
                                        <a class="navbar-item" href="{{ route('trainer_edit', auth()->user()->trainer->name) }}">
                                            <i class="fas fa-user-edit">&nbsp;</i>Edit Trainer
                                        </a>
                                        <a class="navbar-item">
                                            <i class="fas fa-user-clock">&nbsp;</i>History
                                        </a>
                                    @endif
                                    <hr class="navbar-divider">
                                    <a class="navbar-item" href="{{ route('bug_report_create') }}">
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

<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {

                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>
