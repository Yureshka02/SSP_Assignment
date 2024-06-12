<x-app-layout>
    <div class="bg-cover bg-center" style="background-image: url('{{ asset('assets/login2.jpg') }}');">
        <x-authentication-card>
            <x-slot name="logo">

                    <img src="{{ asset('assets/logo.png') }}" alt="Your New Logo">

            </x-slot>

            <x-validation-errors class="mb-4" />

            @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
            @endsession

            <form method="POST" action="{{ route('login') }}" class="w-96 border border-gold-500 rounded-md p-6"> <!-- Added gold border -->
                @csrf

                <div class="mb-6"> <!-- Increased margin bottom -->
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full rounded-md p-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4 mb-6"> <!-- Increased margin top and bottom -->
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full rounded-md p-3" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mb-6"> <!-- Increased margin bottom -->
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ms-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </div>
</x-app-layout>
