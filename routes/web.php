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
/*
Route::get('/{page?}', function () {
    return view('main');
});*/
Route::get('/', 'Blog@index');
Route::get('blog/test', 'Blogger@test');

Route::get('blog/{id}', 'Blog@getBlogById')->where('id', '[0-9]+');
Auth::routes();
Route::get('logout','LoginController@logout');

Route::get('dashboard', 'Blogger@index')->name('home');
Route::post('blog/update', 'Blogger@updateBlog');
Route::post('blog/delete', 'Blogger@deleteBlog');


Route::get('create-user', function(){
  return view('auth.createuser');
})->middleware('check_admin');
Route::post('create-user', 'Auth\RegisterController@createUser')->middleware('check_admin');

Route::post('blog/create-blog', 'Blogger@createBlog');
Route::get('blog/create-blog', function(){
  return view('bloggers.create');
});

Route::get('user/change-password', function(){
  return view('bloggers.changepassword');
})->name('change-password');
Route::post('user/change-password', 'Blogger@updatePassword');
Route::post('change-status', 'Blogger@changeStatus');
Route::post('delete-blogger', 'Blogger@deleteBlogger');

Route::get('bloggers-list', 'Blogger@bloggersList' )->name('bloggers-list');
