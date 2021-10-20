<x-guest-layout>

    <body class="leading-normal tracking-normal text-white gradient"
        style="font-family: 'Source Sans Pro', sans-serif;">
        <div class="mt-20">&nbsp;</div>
        <section class="bg-white border-b py-8">
            <div class="container max-w-5xl mx-auto m-8">
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    {{ $book->title }}
                </h1>
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="border p-5 md:p-5 md:grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="col-span-1">
                        <img class="rounded shadow-md focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                            src="{{ Storage::url($book->cover) }}" alt="">
                    </div>
                    <div class="col-span-2 px-5 md:px-20 space-y-5">
                        <h1 class="text-3xl md:text-4xl text-gray-800 font-bold pt-1 md:pt-20 mt-10 md:mt-20">{{ $book->title }}</h1>
                        <p class="text-gray-400">{{ $book->description }}</p>

                        <div x-data="{ show: false }">
                            <div class="">
                                <a href="{{ route('readchapter', $book->id) }}"
                                    class="mx-auto my-4 bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded mt-1 md:mt-4 lg:mt-0 py-5 px-5 shadow opacity-75">
                                    Start Reading Now
                                </a>                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</x-guest-layout>
