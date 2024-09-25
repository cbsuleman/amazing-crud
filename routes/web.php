<?php

use App\Livewire\CreateUser;
use App\Livewire\Dashboard;
use App\Livewire\EditUser;
use App\Livewire\ShowUser;
use App\Livewire\UserListing;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->middleware(['auth', 'verified', 'User'])->name('dashboard');

//function () {
//    return view('livewire.dashboard');
//}


Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->middleware(['auth', 'verified', 'Admin' ])->name('admin.dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/users', UserListing::class)->middleware(['auth', 'verified', 'Admin']);
Route::get('/users/{user}', EditUser::class)->middleware(['auth', 'verified', 'Admin']);
Route::get('/create-user', CreateUser::class)->middleware(['auth', 'verified', 'Admin']);

require __DIR__.'/auth.php';
