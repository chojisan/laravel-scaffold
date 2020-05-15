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
    'prefix'     => config('takada.admin_url') . '/cms',
    'middleware' => ['auth', 'verified']
],
function() {
    Route::resource('/categories', 'CategoryController@index');
    Route::resource('/tags', 'TagController@index');
    Route::resource('/articles', 'ArticleController@index');
});
