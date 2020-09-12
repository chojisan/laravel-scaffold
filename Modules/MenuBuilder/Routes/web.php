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
    'middleware' => ['auth', 'verified'],
],
function() {
    Route::get('/menus', 'MenuBuilderController@index');
    Route::get('/menus/{id}/edit', 'MenuBuilderController@edit');
    Route::put('/menus/{id}/update', 'MenuBuilderController@update');
    Route::delete('/menus/{id}/destroy', 'MenuBuilderController@delete');
    Route::get('/menus/{id}/builder', 'MenuBuilderController@builder');
});
