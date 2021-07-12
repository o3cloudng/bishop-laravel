<x-guest-layout>

    <body class="leading-normal tracking-normal text-white gradient"
        style="font-family: 'Source Sans Pro', sans-serif;">
        <div class="mt-20">&nbsp;</div>
        <section class="bg-white border-b py-8">
            <div class="container max-w-5xl mx-auto m-8">
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    Contact
                </h1>                
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="w-full mb-4 text-gray-600">
                    <form method="POST" action="{{ route('contact') }}">
                        @csrf
            
                        <!-- Full Name -->
                        <div >
                            <x-label for="fullname" :value="__('Full Name')" />
            
                            <x-input id="fullname" class="block mt-1 w-full" placehold="Full name" type="text" name="fullname" :value="old('fullname')" required autofocus />
                        </div>
                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />
            
                            <x-input id="email" class="block mt-1 w-full" placehold="Email Address" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        <!-- Phone -->
                        <div>
                            <x-label for="phone" :value="__('Phone')" />
            
                            <x-input id="phone" class="block mt-1 w-full" placehold="Phone number" type="text" name="phone" :value="old('phone')"/>
                        </div>
                        <!-- Address -->
                        <div>
                            <x-label for="address" :value="__('Address')" />
            
                            <x-textarea id="address" class="block mt-1 w-full" placehold="Address" name="address" :value="old('address')" />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3 mx-auto bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        {{-- <section class="bg-gray-200 border-b py-8 px-20">
            <div class="flex flex-wrap">
                <div class="flex flex-wrap -mx-4">
                    <div class="md:w-1/5 h-auto px-4">
                        <div class="h-full w-full bg-cover rounded shadow-md">
                            <img class="rounded shadow-md"
                                src="{{ asset('images/books/politics-front.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="md:w-1/5 h-auto px-4">
                        <div class="h-full w-full bg-cover rounded shadow-md">
                            <img class="rounded shadow-md"
                                src="{{ asset('images/books/no-more-delay-front.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="md:w-1/5 h-auto px-4">
                        <div class="h-full w-full bg-cover rounded shadow-md">
                            <img class="rounded shadow-md"
                                src="{{ asset('images/books/the-wedding-gift-front.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="md:w-1/5 h-auto px-4">
                        <div class="h-full w-full bg-cover rounded shadow-md">
                            <img class="rounded shadow-md"
                                src="{{ asset('images/books/your-miracle-will-happen.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="md:w-1/5 h-auto px-4">
                        <div class="h-full w-full bg-cover rounded shadow-md">
                            <img class="rounded shadow-md"
                                src="{{ asset('images/books/blooming-rose.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

</x-guest-layout>
