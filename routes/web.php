<?php

Route::get('/', 'PostsController@index');

Route::get('search', 'SearchController@index');

Route::get('about', function() {
    return view('about.index');
});

Route::get('contact', function() {
   return view('contact.index');
});

Route::get('posts/{id}', 'PostsController@show');
Route::get('posts/categories/{id}', 'PostsController@category');
Route::post('posts/{id}/comments', 'CommentsController@store');
Route::delete('posts/{id}/comments/{comment_id}', 'CommentsController@destroy');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//users can create, read, update, delete


Route::group(["middleware" => ["admin", "auth"]], function() {
    Route::get('users/posts', 'Users\PostsController@index');
    Route::post('users/posts', 'Users\PostsController@store');
    Route::delete('users/posts/{id}', 'Users\PostsController@destroy');
    Route::get('users/posts/create', 'Users\PostsController@create');
    Route::get('users/posts/{id}/edit', 'Users\PostsController@edit');
    Route::put('users/posts/{id}', 'Users\PostsController@update');
});



