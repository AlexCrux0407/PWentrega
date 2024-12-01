<?php

use App\Http\Controllers\ControladorTurista;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;

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

// Rutas para Hoteles
Route::get('/admin/hoteles/create', [AdminController::class, 'showCreateHotelForm'])->name('admin.createHotel');
Route::post('/admin/hoteles/create', [AdminController::class, 'createHotel'])->name('admin.storeHotel');
Route::get('/admin/hoteles/{id}/edit', [AdminController::class, 'showEditHotelForm'])->name('admin.editHotel');
Route::put('/admin/hoteles/{id}', [AdminController::class, 'updateHotel'])->name('admin.updateHotel');
Route::delete('/admin/hoteles/{id}', [AdminController::class, 'deleteHotel'])->name('admin.deleteHotel');


//rutas reservacion de servicios
Route::view('/reservacion','reservacion');
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create'); 
Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store'); 
Route::get('/reservations/reservacion', [ReservationController::class, 'reservacion'])->name('reservations.reservacion'); 
Route::get('/reservations/user', [ReservationController::class, 'userReservations'])->name('reservations.user'); 
Route::get('/reservations/cancel/{id}', [ReservationController::class, 'cancelReservation'])->name('reservations.cancel');

// Rutas para ajustar tarifas
Route::post('/admin/vuelos/ajustar-tarifas', [AdminController::class, 'ajustarTarifasVuelo'])->name('admin.ajustarTarifasVuelo');
Route::post('/admin/hoteles/ajustar-tarifas', [AdminController::class, 'ajustarTarifasHotel'])->name('admin.ajustarTarifasHotel');

// Reportes en PDF
Route::get('/reportes/vuelos/pdf', [ReportController::class, 'vuelosPdf'])->name('reportes.vuelos.pdf');
Route::get('/reportes/hoteles/pdf', [ReportController::class, 'hotelesPdf'])->name('reportes.hoteles.pdf');

// Reportes en Excel
Route::get('/reportes/vuelos/excel', [ReportController::class, 'vuelosExcel'])->name('reportes.vuelos.excel');
Route::get('/reportes/hoteles/excel', [ReportController::class, 'hotelesExcel'])->name('reportes.hoteles.excel');

