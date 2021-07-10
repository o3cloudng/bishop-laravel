<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                <h2>Add Events</h2>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('event.create') }}">
            @csrf

            <!-- Full Name -->
            <div>
                <x-label for="name" :value="__('Full Name')" />

                <x-input id="name" class="block mt-1 w-full" placehold="Full name" type="email" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" placehold="Email Address" type="text" name="email" :value="old('email')" required autofocus />
            </div>
            <!-- Phone -->
            <div>
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" placehold="Phone number" type="text" name="phone" :value="old('phone')" required autofocus />
            </div>
            <!-- Address -->
            <div>
                <x-label for="address" :value="__('Email')" />

                <x-input id="address" class="block mt-1 w-full" placehold="Address" type="text" name="address" :value="old('address')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Add Event') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
