<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TaxpayerLookup;

Route::get('/', function () {
    return view('welcome');
});


Route::view('/', 'home')->name('home');
Route::get('/tin-checker', TaxpayerLookup::class)->name('tin.checker');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
