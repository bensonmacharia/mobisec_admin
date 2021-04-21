<?php

namespace App\Http\Livewire\Feedback;

use Livewire\Component;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class Form extends Component
{
    public $user_name;
    public $information;

    protected $rules = [
        'user_name' => 'required|min:4',
        'information' => 'required|min:4',
    ];
    
    public function render()
    {
        return view('livewire.feedback.form');
    }
    
    public function createItem()
    {
        $user = Auth::user(); // Retrieve the currently authenticated user
        $id = Auth::id(); // Retrieve the currently authenticated user's ID
        
        $this->validate();

        $item = new Feedback();
        $item->user_name = $this->user_name;
        $item->logged_by = $id;
        $item->information = $this->information;
        $item->save();

        $this->emit('saved');
    }
}