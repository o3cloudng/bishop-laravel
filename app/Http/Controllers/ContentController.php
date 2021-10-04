<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\SubTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $book = Book::findOrFail($id);
        // dd($book);
        return view('admin.ebook.index', ['book' => $book]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ebook.create');
    }

    public function addcontent($id)
    {
        $content = Content::find($id);
        // dd($content->book);
        $chapters = Content::all();
        // $book = Book::find($content->book_id);
        // dd($book->content->chapter);
        // dd($chapters);
        return view('admin.ebook.content', ['content' => $content, 'chapters' => $chapters]);
    }

    public function showebook($id)
    {
        $book = Book::where('id', $id)->get();
        // $chapters = Content::all();
        // $subscription_end_time = Carbon::now()->addDays(30);
        // dd($subscription_end_time);
        return view('books.showebook', ['book' => $book[0]]);
    }

    public function readonline($id)
    {
        $content = Content::find($id);
        $book = Book::where('id', $content->book_id)->get();
        // dd($book[0]->cover);
        $chapters = Content::all();
        return view('pages.ebook', ['content' => $content, 'chapters' => $chapters, 'book' => $book[0]]);
    }
    public function readchapter($id)
    {
        $content = Content::find($id);
        $book = Book::where('id', $content->book_id)->get();
        // dd($book[0]->cover);
        $chapters = Content::all();
        return view('pages.ebook', ['content' => $content, 'chapters' => $chapters, 'book' => $book[0]]);
    }

    public function sub_transaction(Request $request)
    {
        // $request->validate([
        //     'tranxId' => 'required',
        //     'email' => 'required',
        //     'amount' => 'required',
        // ]);


        $subscription_end_time = Carbon::now()->addDays(30);

        // Store
        SubTransaction::create([
            'user_id' => Auth::user()->id,
            'book_id' => $request->book_id,
            'amount' => $request->amount,
            'reference' => $request->reference,
            'tranxId' => $request->tranxId,
            'subscription_end_time' => $subscription_end_time,
            'status' => 'Pending'
        ]);
        // SubTransaction::create($request->all());
        return json_encode(array(
            "statusCode" => 200
        ));
    }

    public function verify($reference)
    {
        // dd($user_id);
        //check if request was made with the right data
        if (!$reference) {
            die("Transaction reference not found");
        }

        // PAYSTACK_SECRET_KEY  

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->get('https://api.paystack.co/transaction/verify/' . $reference);

        $result = $response->json();
        // dd($result);

        if (($result['status'] == true) && ($result['data']['status'] == 'success')) {

            // $refId = $result['data']['metadata']['custom_fields'][0]['refId'];
            // $phone = $result['data']['metadata']['custom_fields'][0]['phone'];
            // $fullname = $result['data']['metadata']['custom_fields'][0]['display_name'];
            // $refId = $result['data']['metadata']['custom_fields'][0]['variable_name'];
            $book_id = $result['data']['metadata']['custom_fields'][0]['variable_name'];
            $reference = $result['data']['reference'];
            // $channel = $result['data']['channel'];
            // $bank = $result['data']['authorization']['bank'];
            $status = $result['data']['status'];
            $amount = $result['data']['amount'];
            // dd($result['data']['authorization']['bank']);
            // dd($refId);
            // $payment = SubTransaction::where('tranxId', $refId)
            // ->update([
            //     'status' => $status,
            //     'reference' => $reference,
            // ]);

            $subscription_end_time = Carbon::now()->addDays(30);

            $checkRef = SubTransaction::where('reference', $reference)->get();

            // dd($status);
            // $tranxId = 12345;

            // if (!$checkRef) {
            //     // Store
            //     $payment = SubTransaction::create([
            //         'user_id' => Auth::user()->id,
            //         'book_id' => $book_id,
            //         'amount' => $amount,
            //         'reference' => $reference,
            //         'tranxId' => '',
            //         'subscription_end_time' => $subscription_end_time,
            //         'status' => $status
            //     ]);
            //     // dd($payment);
            //     if ($payment) {
            //         return back()->with('status', 'Payment made successfully.');
            //     } else {
            //         return "No reference found.";
            //     }
            // }



            return back()->with('status', 'Payment made successfully.');
            //Perform necessary action
        } else {
            echo "Transaction was unsuccessful";
        }
        // return view('books.show', ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
