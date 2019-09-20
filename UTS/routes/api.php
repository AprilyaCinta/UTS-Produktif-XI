<?php

use Illuminate\Http\Request;

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

// Route::get('book', 'BookController@book');
Route::middleware(['jwt.verify'])->group(function(){
  // Route::get('/book', 'BookController@index');
  // Route::get('/book/{id}', 'BookController@show');
  // Route::post('/book', 'BookController@store');
  // Route::put('/book/{id}', 'BookController@update');
  // Route::delete('/book/{id}', 'BookController@destroy');
});

Route::get('crud', 'CrudController@index');
Route::post('crud', 'CrudController@create');
Route::get('/crud/{id}', 'CrudController@detail');
Route::put('/crud/{id}', 'CrudController@update');
Route::delete('/crud/{id}', 'CrudController@delete');

Route::get('pinjam', 'PinjamController@index');
Route::post('pinjam', 'PinjamController@create');
Route::get('/pinjam/(id)', 'PinjamController@detail');
Route::put('/pinjam/{id}', 'PinjamController@update');
Route::delete('/pinjam/{id}', 'PinjamController@delete');
// Route::get('bokall', 'BookController@bookAuth')->middleware('jwt.verify');
// Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
