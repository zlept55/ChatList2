<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Conversation;

class ChatList extends Component
{
    public $auth_id;
    public $conversations;

    public function mount(){
        $this->auth_id= auth()->id();
        $this->conversations= Conversation::where('sender_id', $this->auth_id)
                        ->orWhere('reciever_id', $this->auth_id)->orderBy('last_time_message','Desc')->get();
    }
    public function render()
    {

        return view('livewire.chat.chat-list');
    }
}
