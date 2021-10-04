<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('books.create') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                            <div class="md:flex">
                                <div class="w-full">
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
    
                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    {{-- <div class="p-4 border-b-2"> <span class="text-lg font-bold text-gray-600">Add
                                            documents</span> </div> --}}
                                    <div class="p-3 text-gray-600 space-y-2">
                                        {{-- <div class="mb-2"> <span class="text-sm">Title</span> --}}
                                        <x-input id="title" class="block mt-1 w-full" placeholder="Book Title"
                                            type="text" name="title" :value="old('title')" required autofocus />

                                        <x-input id="description" class="block mt-1 w-full" placeholder="Descritption"
                                            type="text" name="description" :value="old('description')" required autofocus />

                                        {{-- <x-textarea id="description" class="block mt-1 w-full"
                                            placeholder="Descritption" name="description"
                                            :value="old('description')" required autofocus /> --}}

                                        <x-input id="price" class="block mt-1 w-full" placeholder="Price" type="number"
                                            name="price" :value="old('price')" required autofocus />

                                        <x-input id="quantity" class="block mt-1 w-full" placeholder="Quantity"
                                            type="number" name="quantity" :value="old('quantity')" />
                                        {{-- <input type="text" class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300 text-gray-600"> </div> --}}
                                        <div class="mb-2"> 
                                            {{-- <span>Attachments</span> --}}
                                            <div
                                                class="relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                                                <div class="absolute text-gray-600">
                                                    <div class="flex flex-col items-center "> <i
                                                            class="fa fa-cloud-upload fa-3x text-gray-200"></i> <span
                                                            class="block text-gray-400 font-normal">Attach book cover image here</span> <span
                                                            class="block text-gray-400 font-normal">or</span> <span
                                                            class="block text-blue-400 font-normal">Browse files</span>
                                                    </div>
                                                </div> <input type="file" class="h-full w-full opacity-0" name="cover">
                                            </div>
                                            <div class="flex justify-between items-center text-gray-400"> <span>Accepted
                                                    file type:.jpg,png,gif only</span> <span
                                                    class="flex items-center "><i class="fa fa-lock mr-1"></i>
                                                    secure</span> </div>
                                        </div>
                                        <div class="mt-3 text-center pb-3">
                                            <x-button
                                                class="w-full h-12 text-center bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                                {{ __('Add Book') }}
                                            </x-button>
                                            {{-- <button class="w-full h-12 text-lg w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Add Book</button> </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


