<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\SubTransaction;
use Illuminate\Support\Facades\DB;
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
        
        $chapters = Content::all();
        
        return view('admin.ebook.content', ['content' => $content, 'chapters' => $chapters]);
    }

    public function showebook($id)
    {
        $book = Book::where('id', $id)->get();
        
        $sub = DB::table('sub_transactions')
            ->where('book_id', '=', $id)
            // ->where('subscription_end_time', '>', Carbon::now())
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        
        if(count($sub) > 0){
            $sub = Carbon::parse($sub[0]->subscription_end_time);
        } else {
            $sub = "";
        }
        
        return view('books.showebook', ['book' => $book[0], 'sub'=> $sub]);
    }

    public function readonline($book_id)
    {
        $content = Content::where('book_id', '=', $book_id)->get();
        // Check Subscription status
        $sub = DB::table('sub_transactions')
        ->where('subscription_end_time', '>', Carbon::now())
        ->where('user_id', '=', Auth::user()->id)
        ->where('book_id', '=', $book_id)
        ->get();

        // dd($content);

        if(count($sub) > 0){
            // return back()->with('status', 'You have not subscribed for the book.');
            if(!$content){
                return back()->with('status', 'This book has not been uploaded yet.');
            }
            $book = Book::where('id', $book_id)->get();
            // $chapters = Content::where('book_id', '=',$book_id)->get();
            
            // dd($book);
            return view('read.index', ['book' => $book[0]]);
        }
        // dd($book[0]->cover);
    }
    public function readchapter($book_id)
    {
        $sub = DB::table('sub_transactions')
        // ->where('subscription_end_time', '>', Carbon::now())
        ->where('user_id', '=', Auth::user()->id)
        ->where('book_id', '=', $book_id)
        ->get();

        if(count($sub) > 0){
            $chapters = DB::table('contents')
                ->where('book_id', '=', $book_id)
                ->get();
                
            $book = Book::where('id', '=', $book_id)->get();
            return view('read.ebook', ['chapters' => $chapters, 'book' => $book[0]]);
        } else {
            return back()->with('status', 'This book has not been uploaded yet.');
        }

        // dd($book[0]->cover);
    }

    public function sub_transaction(Request $request)
    {
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
        // dd(env('PAYSTACK_SECRET_KEY'));

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->get('https://api.paystack.co/transaction/verify/' . $reference);

        $result = $response->json();
        // dd($result);

        if (($result['status'] == true) && ($result['data']['status'] == 'success')) {
            
            $book_id = $result['data']['metadata']['custom_fields'][0]['variable_name'];
            $reference = $result['data']['reference'];
            $status = $result['data']['status'];
            $amount = $result['data']['amount'];

            $subscription_end_time = Carbon::now()->addDays(30);
            $amount = str_replace("00", "0", $amount);

            $payment = DB::table('sub_transactions')->insert([
                'user_id' => Auth::user()->id,
                'book_id' => $book_id,
                'amount' => $amount,
                'reference' => $reference,
                'tranxId' => '',
                'subscription_end_time' => $subscription_end_time,
                'status' => $status,
                "created_at" =>  Carbon::now(), # new \Datetime()
                "updated_at" => Carbon::now(),  # new \Datetime()
            ], true);
            // dd($payment);
            if ($payment) {
                // return back()->with('status', 'Payment made successfully.');
                return redirect('myprofile')->with('status', 'Payment made successfully.');
            } else {
                return back()->with('status', 'No reference found.');
            }


            return back()->with('status', 'No reference found.');

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


    public function myprofile(){
        
        $user_id = Auth::user()->id;
        // $user = User::find($user_id);
        $subs = SubTransaction::where('user_id', '=', $user_id)
        // ->where('subscription_end_time', '>', Carbon::now())
        ->paginate(5);
        
        $books = DB::table('books AS b')
            ->select([
                'b.id','b.title', 'b.cover', 's.subscription_end_time', 's.user_id'
            ])->join('sub_transactions as s', 'b.id', '=', 's.book_id')
            ->where('s.user_id', '=', Auth::user()->id)
            // ->where('subscription_end_time', '>', Carbon::now())
            ->get();
           
        return view('myprofile', ['mytranx' => $subs, 'mybooks' => $books]);
    }

    public function readbook($bookId, $chapter){

        $sub = DB::table('sub_transactions')
            ->where('subscription_end_time', '>', Carbon::now())
            ->where('user_id', '=', Auth::user()->id)
            ->where('book_id', '=', $bookId)
            ->get();

        if(count($sub) > 0){

            $chapters = Content::where('book_id', '=', $bookId)
                        ->get();
            // dd($chapters);

            $content = DB::table('books AS b')
            ->select([
                'b.id','b.title', 'b.cover', 'c.chapter', 'c.chapter_content'
            ])->join('contents as c', 'b.id', '=', 'c.book_id')
            ->where('book_id', '=', $bookId)
            ->where('chapter', 'like', $chapter)
            ->get();

            // dd($content);
            if($content == "") {
                return "No content found.";
            }else{
                // return $content;
                return view('read.ebook', ['book' => $content[0], 'chapters' => $chapters]);
            }
        } else {
            return back()->with('status', 'No subscription found.');

        }

    }
}
