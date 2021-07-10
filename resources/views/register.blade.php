<x-guest-layout>
    <div class="mt-20">&nbsp;</div>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                
            </a> --}}
        </x-slot>
        <h1 class="mb-4 text-gray-900 text-3xl font-bold">Register for Event</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="text-gray-600 space-y-10">



            <form method="POST" action="{{ route('event.register') }}">
                @csrf

                <!-- Full Name -->
                    {{-- <x-label for="fullname" :value="__('Full Name')" /> --}}
                    <x-input id="fullname" class="block mb-3 w-full" placeholder="Full name" type="text" name="fullname"
                        :value="old('fullname')" required autofocus />

                <!-- Email Address -->
                    {{-- <x-label for="email" :value="__('Email')" /> --}}

                    <x-input id="email" class="block mb-3 w-full" placeholder="Email Address" type="email" name="email"
                        :value="old('email')" required autofocus />
                        
                <!-- Email Address Confirm -->
                    {{-- <x-label for="email-confirmation" :value="__('Confirm Email')" /> --}}
                    <x-input id="email-confirmation" class="block mb-3 w-full" placeholder="Email Address Confirmation"
                        type="email" name="email_confirmation" :value="old('')" required autofocus />
                        

                <!-- Phone -->
                <div>
                    {{-- <x-label for="phone" :value="__('Phone')" /> --}}

                    <x-input id="phone" class="block mb-3 w-full" placeholder="Phone number" type="text" name="phone"
                        :value="old('phone')" required autofocus />
                </div>
                <!-- Price -->
                <div>
                    {{-- <x-label for="price" :value="__('Price')" /> --}}

                    <x-input id="price" class="block mb-3 w-full" placeholder="Price" type="text" value="Free"
                        disabled />
                    <x-input type="hidden" name="price" value="Free" />
                </div>
                <!-- Buying -->
                <div>
                    <x-label for="buying" :value="__('Buying?')" />

                    <x-input id="buying_yes" placeholder="Price" name="buying" type="radio" value="Free" />
                    <x-label for="buying_yes" :value="__('Yes')" />
                    <x-input id="buying_no" placeholder="Price" name="buying" type="radio" value="Free" />
                    <x-label for="buying_no" :value="__('No')" />
                </div>
                <!-- Address -->
                <div>
                    <x-label for="address" :value="__('Address')" />

                    <x-textarea id="address" class="block mb-3 w-full" placeholder="Address" type="text" name="address"
                        :value="old('address')" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button
                        class="ml-3 mx-auto bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-auth-card>
    <div class="mt-20 mb-20">&nbsp;</div>
</x-guest-layout>
