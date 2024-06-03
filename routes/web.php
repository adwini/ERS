<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Modify;
use App\Livewire\Admin\AddToken;
use App\Livewire\Admin\Voting;


use App\Livewire\Manager\AccountManagement;
use App\Livewire\Manager\AccountSettings;
use App\Livewire\Manager\Dashboard as ManagerDashboard;
use App\Livewire\Manager\RewardDistribution;
use App\Livewire\Manager\Voting as ManagerVoting;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;




Route::middleware(['auth','verified','admin'])->group(function () {

    Route::view('profile', 'profile')->name('profile');
    Route::get('/branch-list',Modify::class)->name('modify_branch');
    Route::get('/token', AddToken::class)->name('add_token');
    Route::get('/voting', Voting::class)->name('voting');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});

// //  For Demo Purposes Only
Route::middleware(['auth','verified','manager'])->group(function () {

    // Route::view('profile', 'profile')->name('profile');
    Route::get('/account/settings',AccountSettings::class)->name('account.settings');
    Route::get('/account/management',AccountManagement::class)->name('account.management');
    Route::get('/rewards', RewardDistribution::class)->name('rewards');
    Route::get('/auth2/voting', ManagerVoting::class)->name('auth2.voting');
    Route::get('/auth2/dashboard', ManagerDashboard::class)->name('auth2.dashboard');
});


// //  For Demo Purposes Only

// Route::middleware(['auth','verified','employee'])->group(function () {

//     Route::view('profile', 'profile')->name('profile');
//     Route::get('/branch-list',Modify::class)->name('modify_branch');
//     Route::get('/token', AddToken::class)->name('add_token');
//     Route::get('/voting', Voting::class)->name('voting');
//     Route::get('/dashboard', Dashboard::class)->name('dashboard');
// });

require __DIR__.'/auth.php';




// Route::get('', Dashboard::class)->name('admin_dashboard');
// Route::get('/admin/branch-list', Modify::class)->name('admin_branch_list');
// Route::get('/admin/token', AddToken::class)->name('admin_token');
// Route::get('/admin/voting', Voting::class)->name('admin_voting');
