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

Route::group(['middleware' => 'api','namespace' => 'App\Http\Controllers','prefix' => 'auth'], function () {
    Route::post('register', 'UserController@register')->name('register');
    Route::post('login', 'UserController@login')->name('login');
    Route::post('logout', 'UserController@logout')->name('logout');
});

Route::group(['middleware' => 'api','namespace' => 'App\Http\Controllers'], function(){
    Route::get('user/list', 'UserController@list')->name('user_list');
    Route::get('chat/list/id/{id}', 'MessageController@list')->name('chat_list');
    Route::post('delete/{id}', 'UserController@delete')->name('delete');
    Route::post('bug/id/{id}/content/{report}', 'MessageController@bug')->name('bug');
    Route::post('message/idfrom/{idfrom}/idto/{idto}/content/{report}', 'MessageController@message')->name('message');
});