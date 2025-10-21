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

// Route::get('clientes',function() {
//     $clientes = DB::table('clientes')->paginate(5);
//     return view('clientes',['clientes'=>$clientes]);
// });

Route::get('ventas',function() {
    $ventas = DB::table('ventas')->paginate(5);
    return view('ventas',['ventas'=>$ventas]);
});

// Route::get('categorias',function() {
//     $categorias = DB::table('categorias')->paginate(5);
//     return view('categorias',['categorias'=>$categorias]);
// });

Route::get('productos',function() {
    $productos = DB::table('productos')->paginate(5);
    return view('productos',['productos'=>$productos]);
});

Route::get('proveedores',function() {
    $proveedores = DB::table('proveedors')->paginate(5);
    return view('proveedores',['proveedores'=>$proveedores]);
});

// added in class
// ruta a controlador


Route::get('/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [App\Http\Controllers\ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');
Route::get('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'show'])->name('clientes.show');
Route::delete('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::get('/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias.index')->middleware('auth');
Route::get('/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{categoria}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias.show');
Route::get('/categorias/{categoria}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{categoria}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{categoria}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('categorias.destroy');


Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index')->middleware('auth');
Route::get('ventas.index', [App\Http\Controllers\VentaController::class, 'index'])->middleware('auth');
Route::get('producto.index', [App\Http\Controllers\ProductoController::class, 'index'])->middleware('auth');
// Route::get('categorias.index', [App\Http\Controllers\CategoriaController::class, 'index'])->middleware('auth');
Route::get('proveedores.index', [App\Http\Controllers\ProveedorController::class, 'index'])->middleware('auth');

// EMPLEADOS
Route::get('/empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleados.index')->middleware('auth');
Route::get('/empleados/create', [App\Http\Controllers\EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('empleados.store');
Route::get('/empleados/{empleado}', [App\Http\Controllers\EmpleadoController::class, 'show'])->name('empleados.show');
Route::get('/empleados/{empleado}/edit', [App\Http\Controllers\EmpleadoController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{empleado}', [App\Http\Controllers\EmpleadoController::class, 'update'])->name('empleados.update');
Route::delete('/empleados/{empleado}', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('empleados.destroy');

// DEPARTAMENTOS
Route::get('/departamentos', [App\Http\Controllers\DepartamentoController::class, 'index'])->name('departamentos.index')->middleware('auth');
Route::get('/departamentos/create', [App\Http\Controllers\DepartamentoController::class, 'create'])->name('departamentos.create');
Route::post('/departamentos', [App\Http\Controllers\DepartamentoController::class, 'store'])->name('departamentos.store');
Route::get('/departamentos/{departamento}', [App\Http\Controllers\DepartamentoController::class, 'show'])->name('departamentos.show');
Route::get('/departamentos/{departamento}/edit', [App\Http\Controllers\DepartamentoController::class, 'edit'])->name('departamentos.edit');
Route::put('/departamentos/{departamento}', [App\Http\Controllers\DepartamentoController::class, 'update'])->name('departamentos.update');
Route::delete('/departamentos/{departamento}', [App\Http\Controllers\DepartamentoController::class, 'destroy'])->name('departamentos.destroy');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
