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

/**
 *
 */
Route::get('/', function () {
    return view('pages.wiki');
})->name('wiki');

/**
 *
 */
Route::get('dashboard', function () {
    return view('pages.user-dashboard');
})->middleware(['auth'])->name('userDashboard');

/**
 *
 * Route::get('allDisplays', function () {
return view('pages.available-displays');
})->name('allDisplays');
 */

Route::get('allDisplays', 'App\Http\Controllers\NodeDisplayController@index')
    ->middleware(['auth'])->name('allDisplays');

Route::get('showNode/{id}', 'App\Http\Controllers\NodeDisplayController@show')
    ->middleware(['auth'])->name('showNode');


/**
 *
 */
Route::get('userDisplays', function () {
    return view('pages.user-display-nodes');
})->name('userDisplays');


/**
 *
 */
Route::post('storeDisplay', 'App\Http\Controllers\NodeDisplayController@store')
    ->middleware(['auth'])->name('storeDisplay');



/**
 *
 */
Route::get('userContent', function () {
    return view('pages.user-content-upload');
})->name('userContent');

/**
 *
 */
Route::post('storeContent', 'App\Http\Controllers\NodeContentController@store')
    ->middleware(['auth'])->name('storeContent');


Route::get('forum', function () {
    return view('pages.forum');
})->name('forum');

/**
 *
Route::get('imageSlider', function () {
    return view('pages.image-slider');
}) ->middleware(['auth'])->name('imageSlider');
*/

/**
 *
 */
Route::get('imageSlider', 'App\Http\Controllers\NodeContentController@showAllNodeContent')
    ->middleware(['auth'])->name('imageSlider');


require __DIR__ . '/auth.php';
