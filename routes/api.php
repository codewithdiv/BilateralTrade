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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Events
Route::apiResources(['events' => 'API\AdminController']);
Route::post('update_event', 'API\AdminController@updateEvent');
Route::post('delete_event', 'API\AdminController@deleteEvent');

// Users
Route::get('get_users', 'API\AdminController@getUsers');
Route::post('create_users', 'API\AdminController@createUser');
Route::post('edit_user', 'API\AdminController@editUser');
Route::post('delete_user', 'API\AdminController@deleteUser');