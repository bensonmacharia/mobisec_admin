<?php

namespace App\Http\Livewire\Permissions;

use Livewire\Component;
use App\Models\Permissions;

class Show extends Component {

    protected $listeners = ['saved'];

    public function render() {

        $permissions = Permissions::join('users', 'users.id', '=', 'permissions.added_by')
                ->get();

        return view('livewire.permissions.show', ['list' => $permissions]);
    }

    public function saved() {
        $this->render();
    }

}
