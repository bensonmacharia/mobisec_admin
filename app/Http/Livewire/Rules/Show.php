<?php

namespace App\Http\Livewire\Rules;

use Livewire\Component;
use App\Models\Rules;

class Show extends Component {

    protected $listeners = ['saved'];

    public function render() {
        /* $list1 = Rules::all()->sortByDesc('created_at');

          $list = DB::table('rules')
          ->join('users', 'users.id', '=', 'rules.added_by')
          ->get(); */

        $rules = Rules::join('users', 'users.id', '=', 'rules.added_by')
                ->get();

        return view('livewire.rules.show', ['list' => $rules]);
    }

    public function saved() {
        $this->render();
    }

}
