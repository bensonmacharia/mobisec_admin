<?php

namespace App\Http\Livewire\Permissions;

use Livewire\Component;
use App\Models\Permissions;
use Illuminate\Support\Facades\Auth;

class Form extends Component
{
    public $permission;
    public $description;

    protected $rules = [
        'permission' => 'required|min:4',
        'description' => '',
    ];
    
    public function render()
    {
        return view('livewire.permissions.form');
    }
    
    public function createItem()
    {
        $user = Auth::user(); // Retrieve the currently authenticated user
        $id = Auth::id(); // Retrieve the currently authenticated user's ID
        
        $this->validate();

        $item = new Permissions();
        $item->permission = $this->permission;
        $item->added_by = $id;
        $item->description = $this->description;
        $item->save();

        $this->emit('saved');
    }
}