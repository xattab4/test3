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
Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/user', 'Api\AuthController@user');
    Route::post('/logout', 'Api\AuthController@logout');

    Route::get('/category', 'Api\CategoryController@index');
    Route::get('/category/{id}', 'Api\CategoryController@show');

    Route::get('/products', 'Api\ProductController@index');
    Route::get('/product/{id}', 'Api\ProductController@show');
});
