<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="grid md:grid-cols-3 grid-cols-1 gap-5 ">
                    <div class="bg-white shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                        Welcome
                    </div>
                    <div class="bg-white shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                        Welcome
                    </div>
                    <div class="bg-white shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('profile.update') }}">
                            @method('PUT')
                            @csrf
                            <div>
                                {{-- <x-label for="name" :value="__('Name')" /> --}}
                
                                <x-input id="name" placeholder="Name" class="block mb-3 w-full" type="text" name="name" value="{{ auth()->user()->name }}" autofocus />
                            </div>
                            <div>
                                <x-input id="email" placeholder="Phone" class="block mb-3 w-full" type="email" name="email" value="{{ auth()->user()->email }}" autofocus />
                            </div>
                            <div>
                                <x-input id="password" class="block mt-3 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                            </div>
                            <div>
                                <x-input id="password_confirmation" class="block mt-3 w-full"
                                            type="password"
                                            name="password_confirmation" required />
                            </div>

                            <x-button class="mt-3">
                                {{ __('Update') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
