<?php

use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::view('/', 'welcome');
Route::middleware('guest')->group(function () {

    Volt::route('/', 'pages.auth.login')
        ->name('login');

});

Route::view('dashboard', 'livewire.admin.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::view('branch-list', 'livewire.admin.modify')
    ->middleware(['auth', 'verified'])
    ->name('branch-list');

Route::view('token', 'livewire.admin.add_token')
    ->middleware(['auth', 'verified'])
    ->name('add_token');

Route::view('voting', 'livewire.admin.voting')
    ->middleware(['auth', 'verified'])
    ->name('voting');

require __DIR__.'/auth.php';



// Route::get('', Dashboard::class)->name('admin_dashboard');
// Route::get('/admin/branch-list', Modify::class)->name('admin_branch_list');
// Route::get('/admin/token', AddToken::class)->name('admin_token');
// Route::get('/admin/voting', Voting::class)->name('admin_voting');
