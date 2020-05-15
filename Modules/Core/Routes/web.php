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

Route::group([
    'prefix'     => config('takada.admin_url'),
    'middleware' => ['auth', 'verified']
],
function() {
    Route::get('/users', 'UserController@index');
    Route::get('/roles', 'RoleController@index');
    Route::get('/permissions', 'PermissionController@index');
});
