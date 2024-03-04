<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ChartJSController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider y todas ellas serán
| asignadas al grupo de middleware "web". ¡Haz algo grandioso!
|
*/


// Redirects the root URL to the login page and assigns the name 'home' to the route.
Route::redirect('/', '/login')->name('home');

Route::redirect('/home', '/dashboard')->name('dashboard');

// Redirecciones simples para usuarios no autenticados.
Route::get('/logout', function () {
    auth()->logout(); // Asegúrate de cerrar la sesión del usuario antes de redirigir.
    return redirect('/login');
})->name('logout');

// Rutas protegidas con autenticación y verificación de email.
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard',  [ChartJSController::class, 'index']);
});


// Rutas para los empleados.
Route::resource('empleados', EmpleadoController::class)->middleware(['auth']);