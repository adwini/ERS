<?php

use App\Livewire\MainDash;
use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',MainDash::class);
