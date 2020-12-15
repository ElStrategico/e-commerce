<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::get('me', 'AuthController@me')->middleware('auth');
    Route::post('refresh', 'AuthController@refresh')->middleware('auth');
    Route::post('logout', 'AuthController@logout')->middleware('auth');
});


Route::group(['prefix' => 'users'], function () {
    Route::post('', 'UserController@create');
});

Route::group(['prefix' => 'rules'], function () {
    Route::get('', 'RuleController@index')->middleware('auth');
});

Route::group(['prefix' => 'security'], function () {
    Route::put('email', 'SecurityController@changeEmail')->middleware('auth');
    Route::put('password', 'SecurityController@changePassword')->middleware('auth');
});
