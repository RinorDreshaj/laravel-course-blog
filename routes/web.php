<?php

Route::get('/', 'PostsController@index');
Route::get('posts/{id}', 'PostsController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
