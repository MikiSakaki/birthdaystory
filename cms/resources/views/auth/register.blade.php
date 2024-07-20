<x-guest-layout>
    <style>
        body {
            background-color: rgb(255, 255, 153);
            font-family: 'Noto Sans', sans-serif;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .header img {
            height: 80px;
        }

        .custom-button {
            background-color: #FFA54F;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .custom-button:hover {
            background-color: #FFC27A;
        }

        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            width: 100%;
            margin-top: 20px;
        }
    </style>

    <div class="header">
        <img src="{{ asset('images/logo_BS.png') }}" alt="ロゴ">
    </div>

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- CSRFトークンを確認 -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('login') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="ml-4 custom-button">
                {{ __('アカウントを登録する') }}
            </button>
        </div>
    </form>

    <footer>
        <p>Copyright © 2023 wellfami Inc.</p>
    </footer>
</x-guest-layout>
