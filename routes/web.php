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

Route::get('dashboard', function () {
    return view('pages.user-dashboard');
})->middleware(['auth'])->name('userDashboard');

Route::get('allDisplays', 'App\Http\Controllers\NodeDisplayController@index')
    ->middleware(['auth'])->name('allDisplays');


Route::get('userDisplays', 'App\Http\Controllers\NodeDisplayController@showUserNodes')
    ->middleware(['auth'])->name('userDisplays');


Route::get('editNodeDisplay/{id}', 'App\Http\Controllers\NodeDisplayController@edit')
    ->middleware(['auth'])->name('editNodeDisplay');

Route::put('updateNodeDisplay/{id}', 'App\Http\Controllers\NodeDisplayController@update')
    ->middleware(['auth'])->name('updateNodeDisplay');

Route::delete('deleteNodeDisplay/{id}', 'App\Http\Controllers\NodeDisplayController@destroy')
    ->middleware(['auth'])->name('deleteNodeDisplay');





Route::post('storeDisplay', 'App\Http\Controllers\NodeDisplayController@store')
    ->middleware(['auth'])->name('storeDisplay');

Route::get('userContent', 'App\Http\Controllers\NodeContentController@showUserContent')
    ->middleware(['auth'])->name('userContent');


Route::post('storeContent', 'App\Http\Controllers\NodeContentController@store')
    ->middleware(['auth'])->name('storeContent');

Route::get('forum', function () {
    return view('pages.forum');
})->middleware(['auth'])->name('forum');


Route::get('/', function () {
    return view('pages.wiki');
})->name('wiki');


require __DIR__.'/auth.php';

Route::get('imageSlider/{id}', 'App\Http\Controllers\NodeContentController@showAllNodeContent')->name('imageSlider');

Route::get('showNode/{id}', 'App\Http\Controllers\NodeDisplayController@show')
    ->middleware(['auth'])->name('showNode');

Route::post('uploadContent/{id}', 'App\Http\Controllers\NodeDisplayController@uploadToNode')
    ->middleware(['auth'])->name('uploadContent');




