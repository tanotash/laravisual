<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('dash.index');
});
 */

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

/* route::get('/crud', function(){
    return view('crud.index');
});

route::get('/crud/create', function(){
    return view('crud.create');
});
 */
Route::resource('empleados', 'App\Http\Controllers\EmpleadoController');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dash.index');
    })->name('dashboard');
});
