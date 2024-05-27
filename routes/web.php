<?php

use App\Livewire\Admin\Dashboard;
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

Route::middleware(['auth','verified'])->group(function () {

    Route::view('profile', 'profile')->name('profile');
    Route::view('branch-list', 'livewire.admin.modify')->name('branch-list');
    Route::view('token', 'livewire.admin.add_token')->name('add_token');
    Route::view('voting', 'livewire.admin.voting')->name('voting');
    Volt::route('dashboard', 'pages.admin.dashboard')->name('dashboard');
});






require __DIR__.'/auth.php';



// Route::get('', Dashboard::class)->name('admin_dashboard');
// Route::get('/admin/branch-list', Modify::class)->name('admin_branch_list');
// Route::get('/admin/token', AddToken::class)->name('admin_token');
// Route::get('/admin/voting', Voting::class)->name('admin_voting');

Route::post('/branch/create', AddBranch::class);
Route::get('/branch', GetBranch::class);
Route::post('/branch/{branchID}/edit', EditBranch::class);
