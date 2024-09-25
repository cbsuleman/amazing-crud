<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'users' => User::all(),
            'admins' => User::where('role', 'Admin')->get(),
        ]);
    }
}
