<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\User;

class ChatList extends Component
{

    public $conversations;

    protected $listeners = ['conversationCreated' => 'loadConversations'];

    public function mount(){
        $this->loadConversations();
    }

    public function render()
    {
        return view('livewire.chat-list');
    }

    public function loadConversations()
    {
        $userId = auth()->user()->id;

        $this->conversations = Conversation::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->get();
            
        // $this->conversations = User::find($userId)->conversations;
    }
}
