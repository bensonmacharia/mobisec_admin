<?php

namespace App\Http\Livewire\Rules;

use Livewire\Component;
use App\Models\Rules;
use Illuminate\Support\Facades\Auth;

class Form extends Component
{
    public $rule;
    public $description;

    protected $rules = [
        'rule' => 'required|min:4',
        'description' => '',
    ];
    
    public function render()
    {
        return view('livewire.rules.form');
    }
    
    public function createItem()
    {
        $user = Auth::user(); // Retrieve the currently authenticated user
        $id = Auth::id(); // Retrieve the currently authenticated user's ID
        
        $this->validate();

        $item = new Rules();
        $item->rule = $this->rule;
        $item->added_by = $id;
        $item->description = $this->description;
        $item->save();

        $this->emit('saved');
    }
}