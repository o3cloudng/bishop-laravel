<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function books()
    {
        return view('pages.books');
    }

    public function projects()
    {
        return view('pages.projects');
    }
    
    public function ministry()
    {
        return view('pages.ministry');
    }

    public function philantropy()
    {
        return view('pages.philantropy');
    }
    
    public function contact()
    {
        return view('pages.contact');
    }

    public function email(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'address' => ''
        ]);
        return redirect()->back()->with('status', 'Message sent successfully. One of our agents will get in touch with you.');   
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
