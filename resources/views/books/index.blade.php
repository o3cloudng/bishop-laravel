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
                <div class="flex flex-wrap">
                    <div class="flex flex-wrap -mx-4 px-5">
                        @foreach($books as $book)
                        <div class="md:w-1/5 h-auto px-4 mb-5 md:md-0">
                            <div class="h-full w-full bg-cover rounded shadow-md">
                                <img class="rounded shadow-md focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                                src="{{ Storage::url($book->cover) }}" alt="">
                                <h3 class="text-center font-bold text-gray-600 my-5">
                                    <a href="{{ route('books') }}/{{ $book->id }}" class="mx-auto bg-gradient-to-r from-pink-500 to-red-500 text-white font-bold rounded-full mt-4 lg:mt-0 py-2 px-5 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        Buy &#8358;{{ number_format($book->price,2) }}
                                    </a>
                                    <br>
                                    <br>
                                    <a href="{{ route('showebook', $book->id) }}" class="mx-auto bg-black  text-white font-bold rounded-full mt-4 lg:mt-0 py-2 px-5 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        Read online
                                    </a>
                                </h3>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    {{-- <section class="bg-white border-b py-8 text-black">
                        <form id="paymentForm">

                            <div class="form-group">
                          
                              <label for="email">Email Address</label>
                          
                              <input type="email" id="email-address" required />
                          
                            </div>
                          
                            <div class="form-group">
                          
                              <label for="amount">Amount</label>
                          
                              <input type="tel" id="amount" required />
                          
                            </div>
                          
                            <div class="form-group">
                          
                              <label for="first-name">First Name</label>
                          
                              <input type="text" id="first-name" />
                          
                            </div>
                          
                            <div class="form-group">
                          
                              <label for="last-name">Last Name</label>
                          
                              <input type="text" id="last-name" />
                          
                            </div>
                          
                            <div class="form-submit">
                          
                              <button type="submit" onclick="payWithPaystack()"> Pay </button>
                          
                            </div>
                          
                          </form>
                          
                          <script src="https://js.paystack.co/v1/inline.js"></script> 
                          <script>
                            const paymentForm = document.getElementById('paymentForm');
                            paymentForm.addEventListener("submit", payWithPaystack, false);
                            function payWithPaystack(e) {
                            e.preventDefault();
                            let handler = PaystackPop.setup({
                                key: 'pk_test_xxxxxxxxxx', // Replace with your public key
                                email: document.getElementById("email-address").value,
                                amount: document.getElementById("amount").value * 100,
                                ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

                                // label: "Optional string that replaces customer email"
                                onClose: function(){
                                alert('Window closed.');
                                },

                                callback: function(response){

                                let message = 'Payment complete! Reference: ' + response.reference;

                                alert(message);

                                }

                            });

                            handler.openIframe();

                            }
</script>                          
                    </section> --}}
                    {{-- <div class="flex flex-wrap content-between -mx-4 mt-4">
                        <div class="md:w-1/3 h-auto px-4">
                            <div class="h-full w-full bg-cover rounded shadow-md">
                                <img class="rounded shadow-md"
                                    src="{{ asset('images/books/your-miracle-will-happen.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="md:w-1/3 h-auto px-4">
                            <div class="h-full w-full bg-cover rounded shadow-md">
                                <img class="rounded shadow-md"
                                    src="{{ asset('images/books/blooming-rose.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="md:w-1/3 h-auto px-4">
                            <div class="h-full w-full bg-cover rounded shadow-md">
                                <img class="rounded shadow-md"
                                    src="{{ asset('images/books/blooming-rose.jpg') }}" alt="">
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

</x-guest-layout>
