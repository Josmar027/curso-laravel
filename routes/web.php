<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', fn () => auth()->check() ? redirect('/home') : view('welcome'));


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

// Ruta para la pagina de contact

// CREATE
Route::get('/contacts/create', [ContactController::class, 'create'])
    ->name('contacts.create');

Route::post('/contacts', [ContactController::class, 'store'])
    ->name('contacts.store');

// EDIT y UPDATE
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])
    ->name('contacts.edit');

Route::put('/contacts/{contact}/', [ContactController::class, 'update'])
    ->name('contacts.update');

// DELETE
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])
    ->name('contacts.destroy');

//SHOW
Route::get('/contacts/{contact}/', [ContactController::class, 'show'])
    ->name('contacts.show');

//INDEX
Route::get('/contacts', [ContactController::class, 'index'])
    ->name('contacts.index');

// RUTA PARA TODOS LOS METODOS DE CONTACT
// Route::resource('contacts', ContactController::class);

    








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
