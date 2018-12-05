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

Route::get('/grupo/{id}/subgrupo', 'Admin\SubgrupoController@byGrupo');

Route::get('/subgrupo/{id}/especie', 'Admin\EspecieController@bySubgrupo');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
