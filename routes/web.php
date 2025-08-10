<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetallefacturaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModopagoController;
use App\Http\Controllers\ProductoController;
use App\Models\cliente;
use App\Models\modopago;
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

Route::get('/', function () {return view('index');})->name('index');

//rutas para marcas
Route::get('marca/index',[MarcaController::class,'index'])->name('marca.index');
Route::get('marca/create',[MarcaController::class,'create'])->name('marca.create');
Route::post('marca/store',[MarcaController::class,'store'])->name('marca.store');
Route::get('marca/edit/{id}',[MarcaController::class,'edit'])->name('marca.edit');
Route::post('marca/update/{id}',[MarcaController::class,'update'])->name('marca.update');
Route::post('marca/destroy/{id}',[MarcaController::class,'destroy'])->name('marca.destroy');

//rutas para categorias

Route::get('categoria/index',[CategoriaController::class,'index'])->name('categoria.index');
Route::get('categoria/create',[CategoriaController::class,'create'])->name('categoria.create');
Route::post('categoria/store',[CategoriaController::class,'store'])->name('categoria.store');
Route::get('categoria/edit/{id}',[CategoriaController::class,'edit'])->name('categoria.edit');
Route::post('categoria/update/{id}',[CategoriaController::class,'update'])->name('categoria.update');
Route::post('categoria/destroy{id}',[CategoriaController::class,'destroy'])->name('categoria.destroy');

//rutas para modo de pagos

Route::get('modopago/index',[ModopagoController::class,'index'])->name('modopago.index');
Route::get('modopago/create',[ModopagoController::class,'create'])->name('modopago.create');
Route::post('modopago/store',[ModopagoController::class,'store'])->name('modopago.store');
Route::get('modopago/edit/{id}',[ModopagoController::class,'edit'])->name('modopago.edit');
Route::post('modopago/update/{id}',[ModopagoController::class,'update'])->name('modopago.update');
Route::post('modopago/destroy/{id}',[ModopagoController::class,'destroy'])->name('modopago.destroy');

//rutas para estados

Route::get('estado/index',[EstadoController::class,'index'])->name('estado.index');
Route::get('estado/create',[EstadoController::class,'create'])->name('estado.create');
Route::post('estado/store',[EstadoController::class,'store'])->name('estado.store');
Route::get('estado/edit/{id}',[EstadoController::class,'edit'])->name('estado.edit');
Route::post('estado/update/{id}',[EstadoController::class,'update'])->name('estado.update');
Route::post('estado/destroy/{id}',[EstadoController::class,'destroy'])->name('estado.destroy');

//rutas para clientes

Route::get('cliente/index',[ClienteController::class,'index'])->name('cliente.index');
Route::get('cliente/create',[ClienteController::class,'create'])->name('cliente.create');
Route::post('cliente/store',[ClienteController::class,'store'])->name('cliente.store');
Route::get('cliente/edit/{id}',[ClienteController::class,'edit'])->name('cliente.edit');
Route::post('cliente/update/{id}',[ClienteController::class,'update'])->name('cliente.update');
Route::post('cliente/destroy/{id}',[ClienteController::class,'destroy'])->name('cliente.destroy');

//rutas para productos

Route::get('producto/index',[ProductoController::class,'index'])->name('producto.index');
Route::get('producto/create',[ProductoController::class,'create'])->name('producto.create');
Route::post('producto/store',[ProductoController::class,'store'])->name('producto.store');
Route::get('producto/edit/{id}',[ProductoController::class,'edit'])->name('producto.edit');
Route::post('producto/update/{id}',[ProductoController::class,'update'])->name('producto.update');
Route::post('producto/destroy/{id}',[ProductoController::class,'destroy'])->name('producto.destroy');

// rutas para facturas

Route::get('factura/index',[FacturaController::class,'index'])->name('factura.index');
Route::get('factura/create',[FacturaController::class,'create'])->name('factura.create');
Route::post('factura/store',[FacturaController::class,'store'])->name('factura.store');
Route::get('factura/edit/{id}',[FacturaController::class,'edit'])->name('factura.edit');
Route::post('factura/update/{id}',[FacturaController::class,'update'])->name('factura.update');
Route::post('factura/destroy/{id}',[FacturaController::class,'destroy'])->name('factura.destroy');

// rutas para detallefacturas

Route::get('detallefactura/index',[DetallefacturaController::class,'index'])->name('detallefactura.index');
Route::get('detallefactura/create',[DetallefacturaController::class,'create'])->name('detallefactura.create');
Route::post('detallefactura/store',[DetallefacturaController::class,'store'])->name('detallefactura.store');
Route::get('detallefactura/edit/{id}',[DetallefacturaController::class,'edit'])->name('detallefactura.edit');
Route::post('detallefactura/update/{id}',[DetallefacturaController::class,'update'])->name('detallefactura.update');
Route::post('detallefactura/destroy/{id}',[DetallefacturaController::class,'destroy'])->name('detallefactura.destroy');