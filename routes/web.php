<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


Route::get('/prueba', function () {
    return view('inicio2');
});

Route::get('/', function () {
    return view('inicio');
})->name('home');

// for logged in users
Route::get('inicio2',function() {
    return view('inicio2');
})->name('inicio2');

Route::get('acercade',function() {
    return view('acercade');
})->name('acercade');

Route::get('contacto',function() {
    return view('contacto');
})->name('contacto');

Route::get('ayuda',function() {
    return view('ayuda');
})->name('ayuda');

// original
// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');


Route::get('dashboard', function () {
    return view("inicio2"); //Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});

// Resource controller routes
// CLIENTES
Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index')->middleware('auth');
Route::get('/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [App\Http\Controllers\ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{cliente}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('clientes.destroy');

// CATEGORIAS
Route::get('/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias.index')->middleware('auth');
Route::get('/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{categoria}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias.show');
Route::get('/categorias/{categoria}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{categoria}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{categoria}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('categorias.destroy');

// VENTAS, PRODUCTOS, PROVEEDORES (Controller-based, not DB-based)
Route::get('/ventas', [App\Http\Controllers\VentaController::class, 'index'])->name('ventas.index')->middleware('auth');
Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index')->middleware('auth');
Route::get('/proveedores', [App\Http\Controllers\ProveedorController::class, 'index'])->name('proveedores.index')->middleware('auth');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
