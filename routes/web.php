<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Antriansample;

Route::get('/', Antriansample::class)->name('antrian.sample');
