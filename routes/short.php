<?php

Route::get('/', function () {
    return view('newhome');
})->name('home');

Route::get('/{hashId}', 'PublicController@getLink')->where('hashId', '[A-Za-z0-9]+');
