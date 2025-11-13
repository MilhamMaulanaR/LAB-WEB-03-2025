<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/destinasi', 'pages.destinasi')->name('destinasi');
Route::view('/kuliner', 'pages.kuliner')->name('kuliner');
Route::view('/galeri', 'pages.galeri')->name('galeri');
Route::view('/kontak', 'pages.kontak')->name('kontak');
