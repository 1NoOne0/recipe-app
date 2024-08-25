<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        $friends = Auth::user()->friends()->wherePivot('status', 'accepted')->get();
        return view('friends.index', compact('friends'));
    }

    public function store(Request $request)
    {
        $friend = new Friend();
        $friend->user_email = Auth::user()->email;
        $friend->friend_email = $request->friend_email;
        $friend->status = 'pending';
        $friend->save();

        return redirect()->back();
    }

    public function accept(Friend $friend)
    {
        $friend->status = 'accepted';
        $friend->save();

        return redirect()->back();
    }
}
