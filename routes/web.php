<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
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

Route::get('/', function () {
	
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
	
	Route::controller(ProductoController::class)->group(function () {
		Route::prefix('Producto')->group(function () { 
			Route::get('crear', 'Crear')->name('crear-producto');
			Route::post('guardar', 'Guardar')->name('guardar-producto');
			Route::get('ver/{producto}', 'ver')->name('ver-producto');
			Route::put('editar/{producto}', 'editar')->name('editar-producto');
			Route::get('eliminar/{producto}', 'eliminar')->name('eliminar-producto');
			Route::get('buscar', 'buscar');
		 });
	});

	Route::controller(CompraController::class)->group(function () {
		Route::prefix('Compra')->group(function () { 
			Route::get('crear', 'Crear')->name('crear-compra');
			Route::post('guardar', 'Guardar')->name('guardar-compra');
			Route::get('ver/{compras}', 'ver')->name('ver-compra');
			Route::put('editar/{compras}', 'editar')->name('editar-compra');
			Route::get('eliminar/{compras}', 'eliminar')->name('eliminar-compra');
		 });

		Route::get('users/buscar',[UserController::class,'busqueda']);
	});

	Route::controller(FacturaController::class)->group(function () {
		Route::prefix('Factura')->group(function () { 
			Route::get('crear/masivo', 'CrearMasiva')->name('generar-factura-masiva');
			Route::get('ver/{factura}', 'ver')->name('ver-factura');
			
		 });

		Route::get('users/buscar',[UserController::class,'busqueda']);
	});

	
});


