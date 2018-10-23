<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('notifications',[
            'unreadNotifications' => Auth::user()->unreadNotifications,
            'readNotifications' => Auth::user()->readNotifications
        ]);
    }

    public function read($id)
    {
        DatabaseNotification::find($id)->markAsRead();

        return back()->with('flash', 'La notificacion fue marcada como leida');
    }

    public function destroy($id)
    {
        DatabaseNotification::find($id)->delete();

        return back()->with('flash', 'La notificacion fue eliminada');
    }

}
