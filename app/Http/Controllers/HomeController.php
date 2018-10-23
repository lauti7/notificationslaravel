<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Auth;
use App\Notifications\MessageSent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('home', ['users' => $users]);
    }

    public function send(Request $r){

        $this->validate($r, [
            'body' =>'required',
            'recipient_id' => 'required|exists:users,id',

        ]);
        $message = Message::create([
            'user_id' => Auth::user()->id,
            'recipient_id' => $r->recipient_id,
            'body' => $r->body,
        ]);

        $recipient = User::findOrFail($r->recipient_id);

        $recipient->notify(new MessageSent($message));

        return back()->with('flash', 'Tu mensaje fue enviado');

    }

    public function show($id)
    {
        $message = Message::find($id);


        return view('mshow', ['message' => $message]);
    }

}
