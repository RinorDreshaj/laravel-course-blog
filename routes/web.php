<?php

Route::get('/', 'PostsController@index');
Route::get('posts/{id}', 'PostsController@show');
Route::post('posts/{id}/comments', 'CommentsController@store');
Route::delete('posts/{id}/comments/{comment_id}', 'CommentsController@destroy');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('users/posts', 'Users\PostsController@index');
Route::delete('users/posts/{id}', 'Users\PostsController@destroy');


