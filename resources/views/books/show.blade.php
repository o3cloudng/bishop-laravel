<x-guest-layout>

    <body class="leading-normal tracking-normal text-white gradient"
        style="font-family: 'Source Sans Pro', sans-serif;">
        <div class="mt-20">&nbsp;</div>
        <section class="bg-white border-b py-8">
            <div class="container max-w-5xl mx-auto m-8">
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    Books
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
                                <button @click={show=true} type="button"
                                    class="mx-auto bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full mt-1 md:mt-4 lg:mt-0 py-2 px-5 shadow opacity-75">
                                    Buy &#8358;{{ number_format($book->price, 2) }}
                                </Button>
                                {{-- <button id="pay" type="button" onclick="transactionInit()"
                                class="bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full lg:mt-0 py-2 px-4 shadow opacity-75">Buy Now</Button>
                         --}}
                            </div>
                            <div x-show="show" tabindex="0"
                                class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                                <div @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full"
                                    style="width: 600px;">
                                    <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden text-gray-500">
                                        <button @click={show=false}
                                            class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                        <div class="px-6 py-3 text-xl border-b font-bold">Make Payment (<span id ="book">&#8358;{{ number_format($book->price, 2) }}</span>)</div>
                                        <div class="p-6 flex-grow">
                                            <form action="">
                                                @csrf
                                                <div>
                                                    <div>
                                                        <input class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="fullname" value="{{old('fullname')}}" id="fullname" placeholder="Full Name" />
                                                        <input class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" value="{{old('email')}}" id="email" placeholder="Email Address" />
                                                        <input class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="tel" name="phone" value="{{old('phone')}}" id="phone" placeholder="Phone number" />
                                                        <input class="" type="hidden" name="amount" value="{{ $book->price }}" id="amount"/>
                                                        <select name="state" id="state" class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{old('state')}}" onchange="ship()">
                                                            <option class="text-gray-700" value="">Delevery state</option>
                                                            @foreach ($states as $state )
                                                                <option class="text-gray-700" value="{{ $state->name }}">{{ $state->name }}</option>                                                                
                                                            @endforeach
                                                        </select>
                                                        {{-- <input class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Book cost = &#8358;{{ number_format($book->price, 2) }} " disabled /> --}}
                                                        <input class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="shipping" type="text" placeholder="Shipping fee" disabled />
                                                        <textarea class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="address" id="address" value="{{old('address')}}" rows="3" placeholder="Shipping Address"></textarea>
                                                    </div>
                                                    <div></div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="px-6 py-3 border-t">
                                            <div class="flex justify-between">
                                                <button class="font-bold text-red-500 rounded border-2 border-red-200 px-4 py-2">Total: &#8358;<span id="total">{{ number_format($book->price, 2) }}</span></button>
                                                <div>
                                                    <button id="close" @click={show=false} type="button"
                                                    class="bg-gray-200 text-gray-500 rounded-full px-4 py-2 mr-1">Cancel</Button>
                                                <button id="pay" type="button" onclick="payWithPaystack()"
                                                    class="bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full lg:mt-0 py-2 px-4 shadow opacity-75">Buy Now</Button>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>

function ship() {
    let state = document.getElementById('state').value
    if (state == 'Oyo') {
        document.getElementById('shipping').value = "+ free shipping";
        document.getElementById('total').innerHTML = {{ $book->price }};
        console.log('Select changed ' + state)
    } 
    else if (state == 'Lagos') {
        document.getElementById('shipping').value = "+ 1500";
        document.getElementById('total').innerHTML = {{ $book->price }} + 1500;
        console.log('Select changed ' + state)
        console.log({{ $book->price }} + 1500)
    } 
    else {
        document.getElementById('shipping').value = "+ 2500";
        document.getElementById('total').innerHTML = {{ $book->price }} + 2500;        
        console.log('Select changed ' + state)
        console.log({{ $book->price }} + 2500)
    }
    
}

function randomRefId(string_length) {
    var random_string = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'

    for (var i, i=0; i < string_length; i++){
        random_string += characters.charAt(Math.floor(Math.random() * characters.length))
    }
    return random_string
}
// console.log(randomRefId(10))
var tranxId = randomRefId(10);


// alert(tranxId)

// var tranxId;

// reference, book_id, email, fullname, phone, bank, channel, currency, amount, status
function transactionInit(bookId, email, fullname, phone, amount, tranxId){

    axios.post('http://localhost:8000/api/payments', {
        reference: 'No-reference',
        tranxId: tranxId,
        book_id: {{ $book->id }},
        email: email,
        fullname: fullname,
        phone: phone,
        bank: 'No-bank',
        channel: 'Card',
        currency: 'NGN',
        amount: amount,
        status: 'Pending'
    })
    .then(function (response) {
        console.log('Transaction initiated')
        // return tranxId
    })
    .catch(function (error) {
        // console.log(error)
        console.log('Transaction could not be initiated.')
    });
}
    
function payWithPaystack() {
    const close = document.querySelector('#close').click()
    // Data
    const fullname = document.querySelector('#fullname').value
    const email = document.querySelector('#email').value
    const phone = document.querySelector('#phone').value
    // const amount = document.querySelector('#amount').value
    const amount = document.querySelector('#total').innerHTML
    const address = document.querySelector('#address').value
    const bookId = {{ $book->id }}

    const reference = 'No-reference'
    const bank = 'None'
    const channel = ''
    const currency = 'NGN'
    const status = 'Pending'
    // alert(amount)

    transactionInit(bookId, email, fullname, phone, amount, tranxId)
    
    let amountKobo = amount * 100;

    // close
    var handler = PaystackPop.setup({ 
        key: "{{ env('PAYSTACK_PUBLIC_KEY') }}", //put your public key here
        email: email, //put your customer's email here
        amount: amountKobo, //amount the customer is supposed to pay
        metadata: {
            custom_fields: [
                {
                    display_name: fullname,
                    variable_name: tranxId,
                    phone: phone //customer's mobile number
                }
            ]
        },
        callback: function (response) {
            
            window.location = "{{ route('home') }}/verify/"+response.reference;
            // https://api.paystack.co/transaction/verify/'.$reference; T571487985675064
            axios.get('https://api.paystack.co/transaction/verify/T571487985675064', {
                // lastName: 'Flintstone'
            },
            {
                headers: {
                    'Authorization': ""  // 
                }
            })
            .then(function (response) {
                console.log('Transaction was successful');
                // window.location = "{{ route('home') }}/verify"+response.reference;
                console.log(response.status);
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        onClose: function () {
            //when the user close the payment modal
            alert('Transaction cancelled');
        }
    });
    handler.openIframe(); //open the paystack's payment modal
}
</script>



</x-guest-layout>
