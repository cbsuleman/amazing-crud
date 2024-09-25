<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $date_of_birth;
    public $address;
    public $role;
    public $gender;
    public $image;


    public function updated($prop)
    {
        $this->validateOnly($prop);
    }
    public function rules()
    {
        return [
            'name' => ['required', 'min:4'],
            'email' => ['required', Rule::unique('users')],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required_with:password', 'same:password'],
            'date_of_birth' => ['required', 'before:18 years ago'],
            'address' => ['required', 'min:20'],
            'role' => ['required', Rule::in(['Admin', 'User'])],
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'image' => ['nullable', 'sometimes', 'image', 'max:1024']
        ];
    }

    public function messages()
    {
        return [
            'date_of_birth.before' => 'The user must be 18 years old.'
        ];
    }


    public function save()
    {
        $validated = $this->validate();

        if ($this->image) {
            $validated['image'] = $this->image->store('uploads', 'public');
        }

        $user = User::create(Arr::except($validated, 'password_confirmation'));
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'date_of_birth', 'address', 'role', 'gender', 'image']);
        $this->dispatch('notify', 'User Created successfully');
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
