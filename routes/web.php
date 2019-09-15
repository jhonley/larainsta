<?php
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/
Auth::routes();

// Tutorial

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@home');
Route::get('/posts','PostsController@index')->name('perfil');
Route::get('/posts/create','PostsController@create');
Route::post('/posts','PostsController@store');
Route::get('/posts/{id}', 'PostsController@Perfil')->name('perfiluser');
Route::resource('notifications', 'NotificationController');

// feito

Route::get('/like/{idPost}','PostsController@like')->name('like');
Route::get('/dislike/{idPost}','PostsController@dislike')->name('dislike');
Route::post('/comments', 'PostsController@comments')->name('comments');
Route::get('/unset_comments/{comment_id}', 'PostsController@unset_comments')->name('unset_comments');