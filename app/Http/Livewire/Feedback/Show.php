<?php

namespace App\Http\Livewire\Feedback;

use Livewire\Component;
use App\Models\Feedback;

class Show extends Component {

    protected $listeners = ['saved'];

    public function render() {

        $feedback = Feedback::join('users', 'users.id', '=', 'feedback.logged_by')
                ->get();

        return view('livewire.feedback.show', ['list' => $feedback]);
    }

    public function saved() {
        $this->render();
    }

}
