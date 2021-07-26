<?php

namespace App\Http\Controllers;

use App\Mail\RegisterEmail;
use Illuminate\Http\Request;
use App\Models\EventRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EventRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventRegister = EventRegister::all();
        // dd($eventRegister);
        return view('registerList', ['data' => $eventRegister]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
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
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|confirmed|unique:event_registers',
            'phone' => 'required',
            'buying' => '',
            'price' => '',
            'address' => ''
        ]);

        // dd($request->email);
        // Mail::to($request->email)->send(new RegisterEmail());

        // Store
        $eventRegsiter =EventRegister::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'price' => $request->price,
            'buying' => $request->buying,
            'address' => $request->address,
        ]);

        // Sign in after registration
        // auth()->attempt($request->only('email', 'password'));
        // Redirect
        if($eventRegsiter){
            return back()->with('status', 'Registration successfull.');
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
