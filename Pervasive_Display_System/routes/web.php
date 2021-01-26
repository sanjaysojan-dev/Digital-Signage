<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.wiki');
})->name('wiki');

Route::get('userDisplays', function () {
    return view('pages.user-display-nodes');
})->name('userDisplays');

Route::get('imageSlider', function () {
    return view('pages.image-slider');
})->name('imageSlider');



Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
