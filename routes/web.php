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

Route::get('/documentation', function () {
    return view('pages.documentation-page-guide');
})->name('documentation');

Route::get('/nodeGuide', function () {
    return view('pages.documentation-node-wiki');
})->name('nodeGuide');

Route::get('/contentGuide', function () {
    return view('pages.documentation-content-wiki');
})->name('contentGuide');

Route::get('/nodeContentGuide', function () {
    return view('pages.documentation-node-content-wiki');
})->name('nodeContentGuide');

Route::get('/raspberryGuide', function () {
    return view('pages.documentation-raspberry-wiki');
})->name('raspberryGuide');



Route::get('/tcs', function () {
    return view('pages.terms-and-conditions');
})->name('tcs');



Route::get('allDisplays', 'App\Http\Controllers\DisplayNodeController@index')
    ->middleware(['auth'])->name('allDisplays');


Route::get('userDisplays', 'App\Http\Controllers\DisplayNodeController@showUserNodes')
    ->middleware(['auth'])->name('userDisplays');


Route::get('editNodeDisplay/{id}', 'App\Http\Controllers\DisplayNodeController@edit')
    ->middleware(['auth'])->name('editNodeDisplay');

Route::put('updateNodeDisplay/{id}', 'App\Http\Controllers\DisplayNodeController@update')
    ->middleware(['auth'])->name('updateNodeDisplay');

Route::delete('deleteNodeDisplay/{id}', 'App\Http\Controllers\DisplayNodeController@destroy')
    ->middleware(['auth'])->name('deleteNodeDisplay');

Route::get('FlagDisplayNode/{id}', 'App\Http\Controllers\DisplayNodeController@flagDisplay')
    ->middleware(['auth'])->name('FlagDisplayNode');




Route::post('storeDisplay', 'App\Http\Controllers\DisplayNodeController@store')
    ->middleware(['auth'])->name('storeDisplay');

Route::get('userContent', 'App\Http\Controllers\DisplayContentController@showUserContent')
    ->middleware(['auth'])->name('userContent');

Route::post('storeContent', 'App\Http\Controllers\DisplayContentController@store')
    ->middleware(['auth'])->name('storeContent');

Route::get('editNodeContent/{id}', 'App\Http\Controllers\DisplayContentController@edit')
    ->middleware(['auth'])->name('editNodeContent');

Route::put('updateNodeContent/{id}', 'App\Http\Controllers\DisplayContentController@update')
    ->middleware(['auth'])->name('updateNodeContent');

Route::delete('deleteNodeContent/{id}','App\Http\Controllers\DisplayContentController@destroy')
    ->middleware(['auth'])->name('deleteNodeContent');

Route::delete('removeFromNode/{content_id}/nodeID/{node_id}','App\Http\Controllers\NodeContentController@removeContentFromNode')
    ->middleware(['auth'])->name('removeFromNode');




Route::get('/', function () {
    return view('pages.wiki');
})->name('wiki');


require __DIR__.'/auth.php';

Route::get('imageSlider/{id}', 'App\Http\Controllers\DisplayNodeController@showAllNodeContent')->name('imageSlider');

Route::get('/showContentImage/{node_id}/{content_id}/', 'App\Http\Controllers\DisplayContentController@showSelectedContent')
    ->middleware(['auth'])->name('showContentImage');


Route::get('showNode/{id}', 'App\Http\Controllers\DisplayNodeController@show')
    ->middleware(['auth'])->name('showNode');

Route::post('uploadContent/{id}', 'App\Http\Controllers\NodeContentController@uploadToNode')
    ->middleware(['auth'])->name('uploadContent');




