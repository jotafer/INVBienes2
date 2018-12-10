<?php

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

Route::get('/', function () {
    //$pdf = resolve('dompdf.wrapper');

    //$pdf = PDF::loadHTML('<h1>test</h1>');

    //return $pdf->stream();
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/inventariobienes', 'InventariobienesController@index');
Route::get('/generarplaqueta', 'InventariobienesController@plaqueta')->name('generarplaqueta');
//Route::get('homeesp', 'HomeespController@index')->name('homeesp.index');
Route::get('inventarioespecies', 'HomeespController@index')->name('inventarioespecies');

Route::get('invespecies', 'HomeespController@nuevaalta')->name('invespecies');

Route::get('proveedoresespecie', 'ProveedorController@proveedoresespecie')->name('proveedoresespecie');

	// Altas Especies
	Route::get('/altas/altaespecie', 'AltaespecieController@index')->name('altaespecie');

	Route::post('/altas/altaespecie', 'AltaespecieController@store');
	Route::get('/altas/{id}/nuevaalta', 'AltaespecieController@nuevaalta');
	Route::post('/altabien/{id}/baja', 'AltaespecieController@baja');

	Route::get('/altaesp/{id}', 'AltaespecieController@edit');
	Route::post('/altaesp/{id}', 'AltaespecieController@update');
	Route::get('/altaesp/{id}/eliminar', 'AltaespecieController@delete');
	Route::get('/altaesp/{id}/restaurar', 'AltaespecieController@restore');

	Route::get('/nuevaalta/{id}', 'AltaespecieController@nuevaalta');

	// Proveedores

	Route::get('/proveedores/{id}', 'AltaespecieController@editp');

	Route::post('proveedores', 'ProveedorController@store');

	// Inventariables

	Route::post('/inventariables', 'InventariableController@store');
	
	Route::post('proveedor/editar', 'ProveedorController@update');
	Route::get('proveedor/{id}/eliminar', 'ProveedorController@delete');

	// Bajas y traslados

	Route::get('/bajas/bajabien', 'BajaController@index')->name('bajabien');

	Route::get('/traslados/trasladobien', 'TrasladoController@index')->name('trasladobien');

	// Ver bienes y Movimientos inventario

	Route::get('/verbienes', 'VerbienesController@index');
	Route::get('/ver/{id}', 'VerbienesController@show');

	Route::get('/inventariables/{id}/traslado', 'VerbienesController@edit');
	Route::post('/inventariables/{id}/traslado', 'VerbienesController@update');

	Route::get('/inventariables/{id}/darbaja', 'VerbienesController@editb');
	Route::post('/inventariables/{id}/darbaja', 'VerbienesController@updateb');


	Route::get('/altas/{id}/traslado', 'AltaController@traslado');
	Route::post('/altabien/{id}/baja', 'AltaController@baja');

	Route::get('/inventariarbien', 'HomeController@inventariarbien');



	// ================================== Grupo de rutas para administracion ==================================

	Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {

	// Administración de Usuarios
	Route::get('/usuarios', 'UserController@index');
	Route::post('/usuarios', 'UserController@store');
	
	Route::get('/usuarios/{codigo}', 'UserController@edit');
	Route::post('/usuarios/{id}', 'UserController@update');

	Route::get('/usuarios/{id}/eliminar', 'UserController@delete');

	// Administración de Grupos
	Route::get('/grupos', 'GrupoController@index');
	Route::post('/grupos', 'GrupoController@store');

	Route::get('/grupos/{id}', 'GrupoController@edit');
	Route::post('/grupos/{id}', 'GrupoController@update');

	Route::get('/grupos/{id}/eliminar', 'GrupoController@delete');

	Route::get('/grupos/{codigo}/restaurar', 'GrupoController@restore');

	// Administración de Subgrupos
	Route::get('/subgrupos', 'SubgrupoController@index');
	Route::post('/subgrupos', 'SubgrupoController@store');

	Route::get('/subgrupos/{id}', 'SubgrupoController@edit');
	Route::post('/subgrupos/{id}', 'SubgrupoController@update');

	Route::get('/subgrupos/{id}/eliminar', 'SubgrupoController@delete');

	Route::get('/subgrupos/{id}/restaurar', 'SubgrupoController@restore');

	// Administración de Especies
	Route::get('/especies', 'EspecieController@index');
	Route::post('/especies', 'EspecieController@store');

	Route::get('/especies/{id}', 'EspecieController@edit');
	Route::post('/especies/{id}', 'EspecieController@update');

	Route::get('/especies/{id}/eliminar', 'EspecieController@delete');

	Route::get('/especies/{codigo}/restaurar', 'EspecieController@restore');



	// Administración de Ubicaciones
	Route::get('/ubicaciones', 'UbicacionController@index');
	Route::post('/ubicaciones', 'UbicacionController@store');

	Route::get('/ubicaciones/{id}', 'UbicacionController@edit');
	Route::post('/ubicaciones/{id}', 'UbicacionController@update');

	Route::get('/ubicaciones/{id}/eliminar', 'UbicacionController@delete');
	Route::get('/ubicaciones/{id}/restaurar', 'UbicacionController@restore');

	// Sub ubicaciones
	Route::post('/sububicaciones', 'SububicacionController@store');

	Route::post('sububicacion/editar', 'SububicacionController@update');
	Route::get('sububicacion/{id}/eliminar', 'SububicacionController@delete');



});
