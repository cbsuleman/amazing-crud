<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowUser extends Component
{
    public $user;

    public function mount(User $user)
    {
        //
    }
    public function render()
    {
        return view('livewire.show-user' , [
            'user' => $this->user,
        ]);
    }
}
