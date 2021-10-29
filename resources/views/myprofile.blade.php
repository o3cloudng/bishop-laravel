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
                    <div class="md:grid-cols-3 md:gap-3 text-gray-500">
                        <div class="md: w-full mx-auto md:col-span-1 border border-gray-200 rounded bg-gray-100 p-5">
                            <ul class="md:divide-y-2 md:divide-gray-200">
                                Welcome <span class="p-2 font-bold rounded w-full text-grey-400">{{ Auth::user()->name }} ({{ Auth::user()->email }})

                                    
                                {{-- <li class="p-3"> Role: <span class="p-2 border font-bold rounded w-full text-grey-400">{{ Auth::user()->role }}</span></li> --}}
                            </ul>
                        </div>
                        <div class="mt-4 md:mt-0 col-span-2 border border-gray-200 rounded bg-gray-100 p-3">
                            @if(count($mybooks) > 0)
                            <div class="grid grid-cols-2 md:grid-cols-5 gap-3 text-gray-500">
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
                <div class="w-full container mt-10 px-2">
                    <h1 class="font-bold text-gray-500">Transaction Detais</h1>
                    <hr>
                    <br>

                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Reference
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Age
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date Paid
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    @foreach ($mytranx as $tranx)                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                        {{-- <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt=""> --}}
                                        </div>
                                        <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ number_format($tranx->amount, 2) }}
                                        </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $tranx->reference }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $tranx->created_at->diffForHumans() }}
                                    </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $tranx->created_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            {{ $tranx->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                    
                                <!-- More people... -->
                                </tbody>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
  


                    <table class="w-full border-collapse border border-gray-200 text-gray-500 p-4">
                        <thead>
                          <tr>
                            
                          </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                      </table>
                      <p class="my-4">{{ $mytranx->links() }}</p>
                </div>
            </div>
        </section>

</x-guest-layout>
