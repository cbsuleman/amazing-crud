<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use function Laravel\Prompts\alert;

class UserListing extends Component
{
    use WithPagination;

    #[Url(as: 's', history: true)]
    public $search;
    public $user;
    public $role = '';

    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    public $perPage = 5;

    public function mount()
    {
        Gate::authorize('Admin', Auth::user());
    }


    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir === 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function delete(User $user)
    {
        $user->delete();
        $this->dispatch('notify', 'User deleted successfully');
    }

    public function render()
    {
        return view('livewire.user-listing', [
            'users' => User::search(trim($this->search))
                ->when($this->role !== '', function ($query) {
                    $query->where('role', $this->role);
                })
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
        ]);
    }


}
