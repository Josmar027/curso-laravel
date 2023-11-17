<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

// Ruta para la pagina de contact
Route::get('/contact', function () {
    return Response::view('contact');
});

// Devolver un json
Route::post('/contact', function (Request $request) {
    return Response::json(["message" => "hola"])->setStatusCode(400);
});

// Query params
/* Route::post('/contact', function (Request $request) {
    dd($request->query('test'));
}); */

// Rutas para el CSRF
Route::get('/change-password', function () {
    return Response::view('change-password');
});
Route::post('/change-password', function () {
    return 'Password changed';
});
