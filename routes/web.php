<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','adminrole']], function() {
    Route::get('admin', function () {
        return view('admin.index');
    })->name('admin');

    // Routs to manage Users
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('deleteuser/{id}', [\App\Http\Controllers\UserController::class, 'deleteuser'])->name('deleteuser');
    Route::get('createuser', [\App\Http\Controllers\UserController::class, 'create'])->name('createuser');
    Route::post('postuser', [\App\Http\Controllers\UserController::class, 'postuser'])->name('postuser');
    Route::get('edituser/{id}', [\App\Http\Controllers\UserController::class, 'edituser'])->name('edituser');
    Route::post('postedituser', [\App\Http\Controllers\UserController::class, 'postedituser'])->name('postedituser');

    // Routs to manage Cinemas
    Route::get('cinemas', [\App\Http\Controllers\CinemaController::class, 'index'])->name('cinemas');

});
