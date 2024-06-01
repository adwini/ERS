<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Modify;
use App\Livewire\Admin\AddToken;
use App\Livewire\Admin\Voting;


use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Admin\DashboardComponents\AddBranch;
use App\Livewire\Admin\DashboardComponents\GetBranch;
use App\Livewire\Admin\DashboardComponents\EditBranch;

// Route::view('/', 'welcome');
Route::middleware('guest')->group(function () {
    Volt::route('/', 'pages.auth.login')
        ->name('login');

});

Route::middleware(['auth','verified','admin'])->group(function () {

    Route::view('profile', 'profile')->name('profile');
    Route::get('/branch-list',Modify::class)->name('modify_branch');
    Route::get('/token', AddToken::class)->name('add_token');
    Route::get('/voting', Voting::class)->name('voting');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});

Route::middleware(['auth','verified','manager'])->group(function () {

    Route::view('profile', 'profile')->name('profile');
    Route::get('/branch-list',Modify::class)->name('modify_branch');
    Route::get('/token', AddToken::class)->name('add_token');
    Route::get('/voting', Voting::class)->name('voting');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});

Route::middleware(['auth','verified','employee'])->group(function () {

    Route::view('profile', 'profile')->name('profile');
    Route::get('/branch-list',Modify::class)->name('modify_branch');
    Route::get('/token', AddToken::class)->name('add_token');
    Route::get('/voting', Voting::class)->name('voting');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});

require __DIR__.'/auth.php';




// Route::get('', Dashboard::class)->name('admin_dashboard');
// Route::get('/admin/branch-list', Modify::class)->name('admin_branch_list');
// Route::get('/admin/token', AddToken::class)->name('admin_token');
// Route::get('/admin/voting', Voting::class)->name('admin_voting');
