<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TryPage;
// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',TryPage::class);
