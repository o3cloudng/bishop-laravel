<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\State;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        // dd($books);
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => '',
            'price' => 'required',
            'old-price' => '',
            'cover' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:20048',
            'quantity' => 'required'
        ]);

        $path = $request->file('cover')->store('public/uploads');

        // Store
        $bookadded =Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'oldprice' => '',
            'quantity' => $request->quantity,
            'cover' => $path
        ]);
        // Sign in after registration
        // auth()->attempt($request->only('email', 'password'));
        // Redirect
        if($bookadded){
            return back()->with('status', 'New book added successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $states = State::all();
        // dd($book);
        return view('books.show', ['book' => $book, 'states' => $states]);
    }

    public function verify($reference)
    {
        // dd($reference);
        //check if request was made with the right data
        if(!$reference){  
            die("Transaction reference not found");
        }

        // PAYSTACK_SECRET_KEY  

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
        ->get('https://api.paystack.co/transaction/verify/'.$reference);

        $result = $response->json();
        
        if (($result['status'] == true) && ($result['data']['status'] == 'success')) {

            // $refId = $result['data']['metadata']['custom_fields'][0]['refId'];
            $phone = $result['data']['metadata']['custom_fields'][0]['phone'];
            // $fullname = $result['data']['metadata']['custom_fields'][0]['display_name'];
            $refId = $result['data']['metadata']['custom_fields'][0]['variable_name'];
            $reference = $result['data']['reference'];
            $channel = $result['data']['channel'];
            $bank = $result['data']['authorization']['bank'];
            $status = $result['data']['status'];
            // dd($result['data']['authorization']['bank']);
            // dd($refId);
            $payment = Payment::where('tranxId', $refId)
            ->update([
                'status' => $status,
                'phone' => $phone,
                'reference' => $reference,
                'bank' => $bank,
                'channel' => $channel,
            ]);
            // dd($status);
            if($payment){
                return back()->with('status', 'Payment made successfully.');
            }
            //Perform necessary action
        }else{
            echo "Transaction was unsuccessful";
        }
        // return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
