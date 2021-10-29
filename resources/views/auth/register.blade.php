<div class="w-full py-7">&nbsp;</div>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> --}}
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Sign Up
            </h1> 
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-2" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="text-gray-500">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="bg-gray-200 py-2 px-3 rounded text-sm text-gray-800 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already Signed Up? Login') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Sign Up') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
