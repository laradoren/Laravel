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
    return view('welcome');
});

Auth::routes();

Route::namespace('\App\Http\Controllers')->prefix('admin')->name('admin.')->group(function() {
    Route::resource('pages', 'PagesController', ['except' => ['show, create, store']]);
});

Route::prefix('admin')->namespace('\App\Http\Controllers')->name('admin.')->group(function () {
    Route::get('blocks/{id}', 'BlockController@index')->name('blocks.index');
    Route::post('blocks/{id}', 'BlockController@store')->name('blocks.store');
    Route::get('blocks/create/{id}', 'BlockController@create')->name('blocks.create');
    Route::delete('blocks/{block}/{id}', 'BlockController@destroy')->name('blocks.destroy');
    Route::put('blocks{block}/{id}', 'BlockController@update')->name('blocks.update');
    Route::get('blocks/{block}/edit/{id}', 'BlockController@edit')->name('blocks.edit');

});



Route::get('/{url}', [
    'as'   => 'page::read',
    'uses' => '\App\Http\Controllers\PagesController@show'
])->where('url', '[^\s]+');
