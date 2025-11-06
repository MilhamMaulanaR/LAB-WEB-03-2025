<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FishController;


Route::get('/', [FishController::class, 'index']);
Route::resource('fishes', FishController::class);