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

Route::get('/', 'WelcomeController@welcome');
Route::get('mes-articles', 'WelcomeController@welcome');

Route::resource('/blog', 'BlogController');
Auth::routes();

Route::group(['middleware' => ['web']], function ()
{
    Route::resource('comments', 'CommentsController');
});

Route::resource('comments', 'CommentsController');

Route::get('/confirm/{id}/{token}', 'Auth\RegisterController@confirm');

Route::get('/home', 'HomeController@index')->name('home');