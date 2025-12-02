<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ReservacionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Estáticas y de Inicio
|--------------------------------------------------------------------------
*/

// index.blade.php
Route::get('/', function () {
    return view('index');
})->name('index'); 

// main.blade.php (Muestra la información del sitio)
Route::get('/main', function () {
    return view('main');
})->name('mainsite');

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación (UsuarioController)
|--------------------------------------------------------------------------
*/

// [GET] Muestra el formulario de login (login.blade.php)
Route::get('/login', function () {
    return view('login');
})->name('login');

// [POST] Procesa el formulario de login y verifica las credenciales
Route::post('/login', [UsuarioController::class, 'login'])->name('login.submit');

// [GET] Cierra la sesión
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');


// [GET] Muestra el formulario de registro (register.blade.php)
Route::get('/register', function () {
    return view('register');
})->name('register');

// [POST] Procesa los datos del registro y crea el usuario
Route::post('/register', [UsuarioController::class, 'registerStore'])->name('register.store');

/*
|--------------------------------------------------------------------------
| Rutas de Reserva (ReservacionController)
|--------------------------------------------------------------------------
*/

// RUTA PARA CERRAR SESIÓN (usa el método que ya existe en UsuarioController)
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');

/*
// [GET] Muestra el formulario de reserva
Route::get('/reservar', function () {
    return view('reservar');
})->name('reservar');
*/

// [GET] Muestra la vista de reservar usando el método 'create' del controlador
Route::get('/reservar', [ReservacionController::class, 'create'])->name('reservar');

// [POST] Procesa el formulario de reserva (ReservacionController@store)
// El controlador guarda los datos en la DB y luego REDIRIGE a /confirmacion
Route::post('/reservar', [ReservacionController::class, 'store'])->name('reservar.store');


// [GET] Muestra la página de confirmación
// Se llega aquí mediante el redirect del controlador 'store'
Route::get('/confirmacion', function () {
    return view('confirmacion');
})->name('confirmacion');

