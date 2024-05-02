<?php

use App\Livewire\Navbar;
use App\Livewire\Sidebar;
use Illuminate\Support\Facades\Route;
use App\Livewire\TryPage;
// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',Navbar::class);
