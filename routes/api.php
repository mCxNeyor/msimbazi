<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('v3/data/',([ApiController::class, 'store']));
Route::get('data',[ApiController::class,'index'])->name('index');



