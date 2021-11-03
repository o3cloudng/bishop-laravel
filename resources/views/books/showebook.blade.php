<x-guest-layout>

    <body class="leading-normal tracking-normal text-white gradient"
        style="font-family: 'Source Sans Pro', sans-serif;">
        <div class="mt-20">&nbsp;</div>
        <section class="bg-white border-b py-8">
            <div class="container max-w-5xl mx-auto m-8">
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    eBooks
                </h1>
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="border p-5 md:p-5 md:grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="col-span-1">
                        <img class="rounded shadow-md focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                            src="{{ Storage::url($book->cover) }}" alt="{{ $book->title }}">
                    </div>
                    <div class="col-span-2 px-5 md:px-20 space-y-5">
                        <h1 class="text-3xl md:text-4xl text-gray-800 font-bold pt-1 md:pt-20 mt-10 md:mt-20">{{ $book->title }}</h1>
                        <p class="text-gray-400">{{ $book->description }}</p>
                        @if($sub)
                        <p class="text-gray-400">
                            You have already subscribed for this book; so, enjoy your readings.</p>
                        <p class="text-gray-400">
                            <a href="{{ route('readchapter', $book->id) }}"
                                class="w-full mx-auto bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded mt-1 md:mt-10 lg:mt-0 py-2 px-5 shadow opacity-75">
                               Continue reading
                            </a>
                        </p>
                        @else
                        <p class="text-gray-400">
                            Get full access forever to read this book online for just &#8358;{{ number_format($book->ebookprice) }} only.</p>
                        @endif

                        <div x-data="{ show: false }">
                            <div class="">
                                @if(!$sub)
                                <button @click={show=true} type="button"
                                    class="mx-auto bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full mt-1 md:mt-4 lg:mt-0 py-2 px-5 shadow opacity-75">
                                    Subscribe Now - &#8358;{{ number_format($book->ebookprice) }}
                                </Button>
                                @endif
                                {{-- <button id="pay" type="button" onclick="transactionInit()"
                                class="bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full lg:mt-0 py-2 px-4 shadow opacity-75">Buy Now</Button>
                         --}}
                            </div>
                            @if(!$sub)
                            <div x-show="show" tabindex="0"
                                class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                                <div @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full"
                                    style="width: 600px;">
                                    <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden text-gray-500">
                                        <button @click={show=false}
                                            class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                        <div class="px-6 py-3 text-xl border-b font-bold">Make Payment (<span id ="book">&#8358;{{ number_format($book->ebookprice) }}</span>)</div>
                                        <div class="p-6 flex-grow">
                                            <form action="/ebook/show/" method="POST">
                                                {{-- @csrf --}}
                                                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                                <div>
                                                    <div>
                                                        <input class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="fullname" value="{{ Auth::user()->name }}" id="fullname" placeholder="Full Name" disabled />

                                                        <input class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" value="{{ Auth::user()->email }}" id="email" placeholder="Email Address" disabled/>

                                                        <input class="shadow border rounded w-full md:w-50 mb-3 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="tel" name="phone" value="{{old('phone')}}" id="phone" placeholder="Phone number (Optional)" />

                                                        <input class="" type="hidden" name="amount" value="{{ $book->ebookprice }}" id="amount"/>
                                                    </div>
                                                    <div></div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="px-6 py-3 border-t">
                                            <div class="flex justify-between">
                                                <button class="font-bold text-red-500 rounded border-2 border-red-200 px-4 py-2">Total: &#8358;<span id="total">{{ number_format($book->ebookprice) }}</span></button>
                                                <div>
                                                    <button id="close" @click={show=false} type="button"
                                                    class="bg-gray-200 text-gray-500 rounded-full px-4 py-2 mr-1">Cancel</Button>
                                                <button id="pay" type="button" onclick="payWithPaystack()"
                                                    class="bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full lg:mt-0 py-2 px-4 shadow opacity-75">Pay Now</Button>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
<script src="https://js.paystack.co/v1/inline.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

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
function transactionInit(book_id, user_id, phone, amount, tranxId){
                            
    const token = document.querySelector('#csrf').value;
    // const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    alert(token);

    axios.defaults.headers.post['anti-csrf-token'] = token;
    axios.post('/subscription', {
        reference: 'No-reference',
        tranxId: tranxId,
        book_id: {{ $book->id }},
        user_id: {{ Auth::user()->id }},
        phone: phone,
        amount: amount,
        status: 'Pending'
    },{
        headers: {'Content-Type': 'application/json'}
    })
    .then((response) => {
        console.log('Transaction initiated')
        // return tranxId
    })
    .catch((error) => {
        // console.log()
        console.log('Transaction Failed!')
        console.log(error)
    });
}
// alert(tranxId);
//  Test
// transactionInit(3, 1, 2348060617790, 500, tranxId);
    
function payWithPaystack() {
    const close = document.querySelector('#close').click()
    // Data
    // const fullname = document.querySelector('#fullname').value
    const email = document.querySelector('#email').value
    const phone = document.querySelector('#phone').value
    const amount = document.querySelector('#amount').value
    // const amount = document.querySelector('#total').innerHTML
    // const address = document.querySelector('#address').value
    const book_id = {{ $book->id }}
    const user_id = {{ Auth::user()->id }}

    const reference = 'No-reference'
    const bank = 'None'
    const channel = ''
    const currency = 'NGN'
    const status = 'Pending'
    // alert(amount)

    
    // transactionInit(book_id, user_id, phone, amount, tranxId);
    
    let amountKobo = amount * 100;

    // close {{ env('PAYSTACK_PUBLIC_KEY')}}
    var handler = PaystackPop.setup({ 
        key: "{{ env('PAYSTACK_PUBLIC_KEY')}}", //put your public key here
        email: "{{ Auth::user()->email }}", //put your customer's email here
        amount: amountKobo, //amount the customer is supposed to pay
        metadata: {
            custom_fields: [
                {
                    display_name: "{{ Auth::user()->name }}",
                    variable_name: {{ $book->id }},
                    phone: phone //customer's mobile number
                }
            ]
        },
        callback: function (response) {
            
            window.location = "/ebook/verify/"+response.reference;
            
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
