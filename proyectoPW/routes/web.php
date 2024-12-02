<?php

use App\Http\Controllers\ControladorTurista;
use App\Http\Controllers\HotelesController;
use App\Http\Controllers\VueloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Rutas para el formulario de inicio de sesión
Route::get('/login', [AuthController::class, 'login'])->name('login'); // Mostrar formulario de inicio de sesión
Route::post('/login', [AuthController::class, 'authenticate'])->name('procesarLogin');

// Rutas para el formulario de registro
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('processRegister');

Route::get('/registro', [AuthController::class, 'register'])->name('registro'); // Mostrar formulario de registro

// Rutas para el admin (sin middleware)
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dashboard');



// Ruta para la página principal
Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

// Otras rutas
Route::post('/procesar-registro', [ControladorTurista::class, 'procesarRegistro'])->name('procesarRegistro');

Route::post('/buscar-hotel', [ControladorTurista::class, 'buscarHotel'])->name('rutabuscarHotel');
Route::post('/buscar-vuelo', [ControladorTurista::class, 'buscarVuelo'])->name('rutabuscarVuelo');
Route::post('/consultar-reserva', [ControladorTurista::class, 'consultarReserva'])->name('rutaConsultar');

Route::get('/vuelos', function () {
    return view('vuelos');
})->name('vuelos');

Route::get('/hoteles', function () {
    return view('hoteles');
})->name('hoteles');

Route::get('/reservacion', function () {
    return view('reservacion');
})->name('reservacion');

Route::post('/reservar-servicio', [ControladorTurista::class, 'reservarServicio'])->name('reservarServicio');



// Rutas para Usuarios
Route::get('/admin/users/create', [AdminController::class, 'showCreateUserForm'])->name('admin.createUser');
Route::post('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.storeUser');
Route::get('/admin/users/{id}/edit', [AdminController::class, 'showEditUserForm'])->name('admin.editUser');
Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

// Rutas para Vuelos
Route::get('/admin/vuelos/create', [AdminController::class, 'showCreateVueloForm'])->name('admin.createVuelo');
Route::post('/admin/vuelos/create', [AdminController::class, 'createVuelo'])->name('admin.storeVuelo');
Route::get('/admin/vuelos/{id}/edit', [AdminController::class, 'showEditVueloForm'])->name('admin.editVuelo');
Route::put('/admin/vuelos/{id}', [AdminController::class, 'updateVuelo'])->name('admin.updateVuelo');
Route::delete('/admin/vuelos/{id}', [AdminController::class, 'deleteVuelo'])->name('admin.deleteVuelo');
Route::post('/buscar-vuelo', [VueloController::class, 'buscarVuelo'])->name('rutabuscarVuelo');
Route::get('/buscar-vuelo', [VueloController::class, 'buscarVuelo'])->name('buscarVuelo');

// Rutas para Hoteles
Route::get('/admin/hoteles/create', [AdminController::class, 'showCreateHotelForm'])->name('admin.createHotel');
Route::post('/admin/hoteles/create', [AdminController::class, 'createHotel'])->name('admin.storeHotel');
Route::get('/admin/hoteles/{id}/edit', [AdminController::class, 'showEditHotelForm'])->name('admin.editHotel');
Route::put('/admin/hoteles/{id}', [AdminController::class, 'updateHotel'])->name('admin.updateHotel');
Route::delete('/admin/hoteles/{id}', [AdminController::class, 'deleteHotel'])->name('admin.deleteHotel');
Route::post('/buscar-hotel', [HotelesController::class, 'buscarHotel'])->name('rutabuscarHotel');
Route::get('/buscar-hotel', [HotelesController::class, 'buscarHotel'])->name('buscarHotel');
Route::get('/buscar-hotel', [HotelesController::class, 'buscarHotel'])->name('hoteles.index');
