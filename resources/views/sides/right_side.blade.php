<div class="w-full max-w-xs">
    @auth
        @if( auth()->user()->trainer->isEmpty())
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        {{ __('*Trainer Name') }}
                    </label>
                    <input id='trainer_name' class="shadow appearance-none border @error('trainer_name') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="trainer_name" type="text" placeholder="Your name in the game" value="{{ old('trainer_name') }}">
                    @error('trainer_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        {{ __('*Trainer Code') }}
                    </label>
                    <input id="trainer_code" class="shadow appearance-none border @error('trainer_code') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="trainer_code" type="trainer_code" placeholder="1234 4567 8910" value="{{ old('trainer_code') }}">
                    @error('trainer_code')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    {{--                    <script>
                                            document.getElementById('trainer_code').addEventListener('input', function (e) {
                                                var target = e.target, position = target.selectionEnd, length = target.value.length;

                                                target.value = target.value.replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
                                                target.selectionEnd = position += ((target.value.charAt(position - 1) === ' ' && target.value.charAt(length - 1) === ' ' && length !== target.value.length) ? 1 : 0);
                                            });
                                        </script>--}}
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        {{ __('*Trainer Level') }}
                    </label>
                    <input id="trainer_level" class="shadow appearance-none border @error('trainer_level') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="trainer_level" type="trainer_level" placeholder="ex. 40" value="{{ old('trainer_level') }}">
                    @error('trainer_level')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        {{ __('*Trainer Team') }}
                    </label>
                    <input id='trainer_team' class="shadow appearance-none border @error('trainer_team') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="trainer_team" type="text" placeholder="Your team in the game" value="{{ old('trainer_team') }}">
                    @error('trainer_team')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        {{ __('Trainer Pokedex') }}
                    </label>
                    <input id='trainer_team' class="shadow appearance-none border @error('trainer_team') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="trainer_team" type="text" placeholder="Your team in the game" value="{{ old('trainer_team') }}">
                    @error('trainer_team')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-20 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Create
                    </button>
                </div>
            </form>
        @else
            <div class="@if(auth()->user()->trainer()->value('team') == 'blue') bg-blue-500 @elseif(auth()->user()->trainer()->value('team') == 'red') bg-red-500 @else bg-yellow-500 @endif shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="flex-mb4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" >
                        Welcome {{ auth()->user()->username }}
                    </label>
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Trainer name {{ auth()->user()->trainer()->value('name') }}
                    </label>
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Trainer code: {{ auth()->user()->trainer()->value('code') }}
                    </label>
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Trainer level: {{ auth()->user()->trainer()->value('level') }}
                    </label>
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Trainer Team: {{ auth()->user()->trainer()->value('team') }}
                    </label>
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Trainer Pokedex: {{ auth()->user()->trainer()->value('pokedex') }}
                    </label>
                    <div class="flex content-start flex-wrap">
                        <div class="w-2/4 p-2">
                            <button class="flex items-center shadow border-gray-500 border-2 rounded-full  px-10 py-2 text-gray-700 text-sm font-bold hover:bg-gray-500 hover:text-white">
                                Edit
                            </button>
                        </div>
                        <div class="w-2/4 p-2">
                            <button class="flex items-center shadow border-gray-500 border-2 rounded-full  px-5 py-2 text-gray-700 text-sm font-bold hover:bg-gray-500 hover:text-white">
                                Logout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth
        @guest
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    {{ __('Username') }}
                </label>
                <input id='username' class="shadow appearance-none border @error('username') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" type="username" placeholder="Username" value="{{ old('username') }}">
                @error('username')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border @error('password') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Sign In
                </button>
                @if (Route::has('password.request'))
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2020 Acme Corp. All rights reserved.
        </p>
    @endguest
</div>
