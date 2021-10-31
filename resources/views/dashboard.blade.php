<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex space-x-200">
                    <div class="w-1/3 py-4 px-8 bg-white shadow-lg rounded-lg my-10 border border-gray-200">
                        <div class="flex justify-center md:justify-end -mt-16">
                          <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="/images/user.png">
                        </div>
                        <div>
                          <h2 class="text-gray-800 text-2xl font-semibold">No. of users</h2>
                          <h1 class="text-gray-800 text-4xl font-bold">{{ $noOfUsers }}</h1>
                          <p class="mt-2 text-gray-600">Total number of registered users.</p>
                        </div>
                        <div class="flex justify-end mt-4">
                          <a href="#" class="text-xl font-medium text-indigo-500">More</a>
                        </div>
                    </div>
                    <div class="w-1/3 py-4 px-8 bg-white shadow-lg rounded-lg my-10 border border-gray-200">
                        <div class="flex justify-center md:justify-end -mt-16">
                          <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="/images/users.png">
                        </div>
                        <div>
                          <h2 class="text-gray-800 text-2xl font-semibold">No. of Active Users</h2>
                          <h1 class="text-gray-800 text-4xl font-bold">{{ $activeUsers }}</h1>
                          <p class="mt-2 text-gray-600">Total number of subscribed users.</p>
                        </div>
                        <div class="flex justify-end mt-4">
                          <a href="#" class="text-xl font-medium text-indigo-500">More</a>
                        </div>
                    </div>
                    <div class="w-1/3 py-4 px-8 bg-white shadow-lg rounded-lg my-10 border border-gray-200">
                        <div class="flex justify-center md:justify-end -mt-16">
                          <img class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" src="/images/sales.png">
                        </div>
                        <div>
                          <h2 class="text-gray-800 text-2xl font-semibold">No. of Sales - 
                              <span class="font-bold">{{ $sales->count() }}</span></h2>
                          <h1 class="text-gray-800 text-4xl font-bold"> &#8358 {{ number_format($total, 2) }}</h1>
                          <p class="mt-2 text-gray-600">Total number of subscriptions and amount</p>
                        </div>
                        <div class="flex justify-end mt-4">
                          <a href="#" class="text-xl font-medium text-indigo-500">More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg my-2">
                <h1 class="font-bold px-5 pt-5 pb-1 text-2xl">Transactions</h1>
                <hr>
                <br>
                <div class="p-6 bg-white border-b border-gray-200 flex space-x-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="mx-auto font-bold px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="font-bold px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        {{-- <th scope="col" class="font-bold px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Amount
                        </th> --}}
                        <th scope="col" class="font-bold px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Book Title
                        </th>
                        <th scope="col" class="font-bold px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Reference
                        </th>
                        <th scope="col" class="font-bold px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Expire
                        </th>
                        <th scope="col" class="font-bold px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date Paid
                        </th>
                        <th scope="col" class="font-bold px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($dtranx as $tranx)                                    
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $tranx->name }}</div>
                            </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $tranx->email }}</div>
                            </td>
                        {{-- <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ number_format($tranx->amount, 2) }}</div>
                        </td> --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $tranx->title }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $tranx->reference }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $tranx->subscription_end_time }}
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
                    </tbody>
                </table>
            </div>
        </div>
        <p class="px-10">{{ $dtranx->links() }}</p>
        </div>
    </div>
</x-app-layout>
