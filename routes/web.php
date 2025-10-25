<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Antriansample;
use App\Livewire\Auth;
Route::get('/', Antriansample::class)->name('antrian.sample');
Route::get('/auth', Auth::class)->name('auth');