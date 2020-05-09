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

  Route::get('/', function() {
    return redirect('/login');
  });

  Auth::routes();


  Route::middleware(['auth'])->group(function() {
    Route::get('/users/{user:username}', 'UserController@show')->name('users.show');

    Route::get('/users/{user:username}/edit', 'UserController@edit')->name('users.edit')->middleware('can:edit,user');
    Route::patch('/users/{user:username}', 'UserController@update')->name('users.update')->middleware('can:edit,user');

    Route::prefix('account')->group(function() {
      Route::get('/password/change', 'PasswordChangeController@change')->name('password.change');
      Route::patch('/password/update', 'PasswordChangeController@update')->name('password.update');
    });

    Route::post('/users/{user:username}/follow', 'FollowController@store')->name('follow.store');

    Route::resource('/posts', 'PostController');

    Route::post('/posts/{post:id}/like', 'LikeController@toggleLike');

    Route::resource('/posts/{post:id}/comments', 'CommentController');

    Route::get('/explore', 'ExploreController@index')->name('explore.index');
  });
