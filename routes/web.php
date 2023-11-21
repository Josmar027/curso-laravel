<?php

use App\Http\Controllers\ContactController;
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
Route::get('/contacts/create', [ContactController::class, 'create'])
    ->name('contacts.create');

Route::post('/contacts', [ContactController::class, 'store'])
    ->name('contacts.store');

    








// Devolver un json
//Route::post('/contact', function (Request $request) {
//    return Response::json(["message" => "hola"])->setStatusCode(400);
//});

// Query params
/* Route::post('/contact', function (Request $request) {
    dd($request->query('test'));
}); */

/* // Rutas para el CSRF
Route::get('/change-password', function () {
    return Response::view('change-password');
});

Route::post('/change-password', function () {
    if (Auth()->check()) {
        return response("Password Changed");
    } else {
        return response("Not Authenticated", 401);
    }
}); */
