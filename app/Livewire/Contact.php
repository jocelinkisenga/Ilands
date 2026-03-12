<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.guest')]
class Contact extends Component
{
    public $name, $email, $subject = 'general', $message;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function sendMessage()
    {
        $this->validate();

        
        Log::info('New Contact Message', [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
            'ip' => request()->ip()
        ]);

        session()->flash('message', 'Thank you. Your secure inquiry has been received.');
        
        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
