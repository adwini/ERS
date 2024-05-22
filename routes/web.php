<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\AddToken;
use App\Livewire\Admin\Modify;
use App\Livewire\Admin\Voting;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Welcome::class);

Route::get('/admin/dashboard', Dashboard::class)->name('admin_dashboard');
Route::get('/admin/branch-list', Modify::class)->name('admin_branch_list');
Route::get('/admin/token', AddToken::class)->name('admin_token');
Route::get('/admin/voting', Voting::class)->name('admin_voting');


