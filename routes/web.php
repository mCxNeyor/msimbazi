<?php

use App\Livewire\Pages\About;
use App\Livewire\Pages\All;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Gauges;
use App\Livewire\Pages\Panel;
use App\Livewire\Pages\Records;
use App\Livewire\Pages\Setting;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',Dashboard::class)->name('home');
Route::get('history',Records::class)->name('records');
Route::get('dashboard',Gauges::class)->name('dashboard');
Route::get('panel',Panel::class)->name('panel');
Route::get('about',About::class)->name('about');
Route::get('setting', Setting::class)->name('settings');
Route::get('alldata/{id}', All::class)->name('all');
