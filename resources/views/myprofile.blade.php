<x-guest-layout>
<style>
    th, td {
        padding: 10px;
        text-align: center;
    }
    th {
        background: #FAFAFA;
        border-bottom: 1px solid #CCC;
    }
</style>
    <body class="leading-normal tracking-normal text-white gradient"
        style="font-family: 'Source Sans Pro', sans-serif;">
        <div class="mt-20">&nbsp;</div>
        <section class="bg-white border-b py-8">
            <div class="container max-w-5xl mx-auto m-8">
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    Profile
                </h1>                
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4 bg-red-100" :status="session('status')" />

                <div class="container mx-auto">
                    <div class="grid grid-cols-3 gap-3 text-gray-500">
                        <div class="col-span-1 border border-gray-200 rounded bg-gray-100 p-5">
                            <ul class="divide-y-2 divide-gray-200">
                                <li class="p-3"> Welcome <span class="p-2 border font-bold rounded w-full text-grey-400">{{ Auth::user()->name }}</span></li>
                                <li class="p-3"> Email: <span class="p-2 border font-bold rounded w-full text-grey-400">{{ Auth::user()->email }}</span></li>
                                {{-- <li class="p-3"> Role: <span class="p-2 border font-bold rounded w-full text-grey-400">{{ Auth::user()->role }}</span></li> --}}
                            </ul>
                        </div>
                        <div class="col-span-2 border border-gray-200 rounded bg-gray-100 p-3">
                            @if(count($mybooks) > 0)
                            <div class="grid grid-cols-4 gap-3 text-gray-500">
                                    @foreach ($mybooks as $mybook)
                                    <div class="col-span-1 border border-gray-100 rounded bg-white p-4">
                                        {{-- <h1 class="font-bold">My Books</h1> --}}
                                        <img class="mb-5 w-full h-70 rounded shadow-md focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                                        src='{{ Storage::url($mybook->cover) }}' alt="{{ $mybook->title }}">  
                                        <a href="{{ route('readonline', $mybook->id) }}"
                                            class="w-full mx-auto bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded mt-1 md:mt-10 lg:mt-0 py-2 px-5 shadow opacity-75">
                                            Read now 
                                        </a> 
                                        
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                    <p class="my-4">You have no book subscription yet.</p>
                                    <a href="{{ route('books') }}"
                                        class="w-full mx-auto bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded mt-1 md:mt-10 lg:mt-0 py-2 px-5 shadow opacity-75">
                                        Read now 
                                    </a> 
                                @endif
                        </div>
                        
                    </div>
                </div>
                <div class="w-full container mt-10">
                    <h1 class="font-bold text-gray-500">Transaction Detais</h1>
                    <table class="w-full border-collapse border border-gray-200 text-gray-500 p-4">
                        <thead>
                          <tr>
                            <th>Amount</th>
                            <th>Reference</th>
                            <th>Age</th>
                            <th>Date Paid</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($mytranx as $tranx)
                            <tr>
                                <td>{{ $tranx->amount }}</td>
                                <td>{{ $tranx->reference }}</td>
                                <td>{{ $tranx->created_at->diffForHumans() }}</td>
                                <td>{{ $tranx->created_at }}</td>
                                <td>{{ $tranx->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <p class="my-4">{{ $mytranx->links() }}</p>
                </div>
            </div>
        </section>

</x-guest-layout>
