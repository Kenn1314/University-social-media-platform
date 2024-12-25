<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\User;

class ConversationController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        // return Conversation::where('sender_id', $id)->orWhere('receiver_id', $id)->get();
        // return $user->receivedConversations;
        return view('user.chat');
    }
}
