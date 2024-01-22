<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
            <a class="navbar-brand" href="{{ url('/') }}"><img width="150" height="50" src="/home/images/lg2.jfif" style="border-radius: 100px" alt="#" /></a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">

            {{-- <a class="navbar-brand" href="{{ url('/') }}"><img width="150" height="50" src="/home/images/lg2.jfif" style="border-radius: 100px; margin-left: 30%" alt="#" /></a> --}}

            @csrf

            <div style="color: #f7444e">
                <x-label for="email" value="{{ __('Email') }}" style="color: #f7444e"/>
                <x-input  id="email" class="block mt-1 w-full option1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4" style="color: #f7444e">
                <x-label for="password" value="{{ __('Password') }}" style="color: #f7444e"/>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            {{-- <div class="block mt-4" style="color: #f7444e">
                <label for="remember_me" class="flex items-center" >
                    <x-checkbox id="remember_me" name="remember"/>
                    <span class="ms-2 text-sm text-gray-600" style="color: #f7444e">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a style="color: #f7444e" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4" style="background: #f7444e">
                    {{ __('Log in') }}
                </x-button>

                <br>
                <br>
            </div>
            <div class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="text-align: center; color: #f7444e; padding-left: 65%">
                <a class="nav-link" href="{{ route('register') }}" >Click here to Register</a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
