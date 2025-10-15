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

Route::get('categorias',function() {
    $categorias = DB::table('categorias')->paginate(5);
    return view('categorias',['categorias'=>$categorias]);
});

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

Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index')->middleware('auth');
Route::get('ventas.index', [App\Http\Controllers\VentaController::class, 'index'])->middleware('auth');
Route::get('producto.index', [App\Http\Controllers\ProductoController::class, 'index'])->middleware('auth');
Route::get('categorias.index', [App\Http\Controllers\CategoriaController::class, 'index'])->middleware('auth');
Route::get('proveedores.index', [App\Http\Controllers\ProveedorController::class, 'index'])->middleware('auth');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
