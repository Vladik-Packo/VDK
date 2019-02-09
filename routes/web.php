<?php

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

use Illuminate\Http\Request;

Route::get('', 'PagesController@home');

Route::group(['prefix' => '{locale}', 'middleware' => 'set_locale', 'where' => ['locale' => '(?:en|nl)']], function () {
    Route::get('', 'PagesController@home')->name('home');

    Route::get('home', 'PagesController@home');
    Route::get('success', 'PagesController@success')->name('success');
    Route::get('balance', 'PagesController@balance')->name('balance');
    Route::get('contact', 'PagesController@contact')->name('contact');

    Route::get('thuis', 'PagesController@home');
    Route::get('succes', 'PagesController@success');
    Route::get('balans', 'PagesController@balance');
});