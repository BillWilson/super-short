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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'see'], function () {

    Auth::routes();

    //Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/list', 'LinkController@linkList')->name('list');

    Route::get('/list/add', 'LinkController@addLink')->name('linkAdd');

    Route::post('/list/add', 'LinkController@addLinkPost')->name('linkAddPost');

    Route::get('/list/{hashId}/edit', 'LinkController@editLink')->name('linkEdit')
        ->where('hashId', '[A-Za-z0-9]+');

    Route::post('/list/{hashId}/edit', 'LinkController@editLinkPost')->name('linkEditPost')
        ->where('hashId', '[A-Za-z0-9]+');

    Route::post('/list/{hashId}/delete', 'LinkController@delLinkPost')->name('linkDeletePost')
        ->where('hashId', '[A-Za-z0-9]+');
});


Route::get('/{hashId}', 'LinkController@getLink')->where('hashId', '[A-Za-z0-9]+');