<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Conversation;

class UserSearchBar extends Component
{

    public $search;
    public $result;
    public $context; // TO DIFFERENTIATE WHICH VIEW THE LIVEWIRE IS INCLUDED

    public function mount($context) {
        $this->search = '';
        $this->result = []; 
        $this->context = $context;
    }

    public function updatedSearch() {
        $this->result = User::where('name', 'like', '%' . $this->search . '%')->where('role', '=', 'user')->where('id', '!=', auth()->user()->id)
        ->get()->toArray();
    }

    public function createConversation($receiver_id)
    {
        $userId = auth()->user()->id; // CURRENT USER ID

        // CHECK TO SEE WHETHER THE CURRENT LOGGED IN USER HAS TALK TO THE SELECTED USER OR NOT
        $conversation = Conversation::where(function ($query) use ($userId, $receiver_id) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', $receiver_id)
                  ->orWhere('sender_id', $receiver_id)
                  ->where('receiver_id', $userId);
        })->get();


        // IF CONVERSATION BETWEEN THE LOGGED IN USER AND THE SELECTED USER IS NOT EXISTED
        if($conversation->isEmpty()) {

            // CREATE A NEW CONVERSATION
            Conversation::create(['sender_id' => auth()->user()->id, 'receiver_id' => $receiver_id]);

            // CALL THE PARENT COMPONENT WHICH IS THE chatList Component's LISTENER
            $this->emitUp('conversationCreated');
        }

        $this->search = '';
        $this->result = [];
    }

    public function render()
    {
        return view('livewire.user-search-bar');
    }
}
