<?php

use Illuminate\Http\Request;

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

//api end in post, basically end point of URL
//ref store func in controller
Route::post('storeArticle', 'ArticlesController@store');
Route::get('getArticles', 'ArticlesController@index');
Route::post('updateArticle/{id}', 'ArticlesController@update');
Route::get('showArticle/{id}', 'ArticlesController@show');
Route::post('deleteArticle/{id}', 'ArticlesController@delete');

Route::post('storeUser', 'UsersController@storeUser');
Route::post('signIn', 'UsersController@signIn');
//sends anyone who tries to access be to index last route
Route::any('{path?}', "UsersController@index")->where("path", ".+");
Route::get('latestArticles', 'ArticlesController@latest'); 