<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Message;

class Chat extends Component
{
    public $chatId;
    public $messages = [];
    public $inputText = "";

    public function mount($chatId)
    {
        $this->chatId = $chatId;
        $this->updateMessages();
    }

    public function render()
    {
        return view('livewire.chat');
    }

    public function updateMessages() {
        $user = Auth::user();
        $this->messages = Message::where('chat_id', $this->chatId)
        ->orderBy('created_at')
        ->get();
    }

    public function send() {
        if (!$this->inputText) {
            return;
        }
        Message::create([
            'sender_id' => Auth::user()->id,
            'chat_id' => $this->chatId,
            'text' => $this->inputText,
        ]);
        $this->inputText = '';
        $this->updateMessages();
    }
}
