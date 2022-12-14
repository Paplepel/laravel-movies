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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movie/{movie_id}/cinemas', [App\Http\Controllers\HomeController::class, 'cinemas'])->name('moviecinemas');
Route::get('/movie/{movie_id}/cinemas/{cinema_id}/screenings', [App\Http\Controllers\HomeController::class, 'screenings'])->name('moviescreenings');
Route::post('/screening/search', [App\Http\Controllers\HomeController::class, 'dateSearch'])->name('dateSearch');

Auth::routes();
    Route::get('tickets', [App\Http\Controllers\TicketController::class, 'myTickets'])->name('mytickets');
    Route::get('ticket/{id}/view', [App\Http\Controllers\TicketController::class, 'viewTicket'])->name('viewticket');
    Route::get('ticket/{id}/cancel', [App\Http\Controllers\TicketController::class, 'cancel'])->name('cancelticket');
    Route::get('/ticket/{screening_id}', [App\Http\Controllers\TicketController::class, 'index'])->name('ticket');
    Route::post('ticket/book', [App\Http\Controllers\TicketController::class, 'book'])->name('book');
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
    Route::get('deletecinema/{id}', [\App\Http\Controllers\CinemaController::class, 'deletecinema'])->name('deletecinema');
    Route::get('createcinema', [\App\Http\Controllers\CinemaController::class, 'create'])->name('createcinema');
    Route::post('postcinema', [\App\Http\Controllers\CinemaController::class, 'postcinema'])->name('postcinema');
    Route::get('editcinema/{id}', [\App\Http\Controllers\CinemaController::class, 'editcinema'])->name('editcinema');
    Route::post('posteditcinema', [\App\Http\Controllers\CinemaController::class, 'posteditcinema'])->name('posteditcinema');

    // Routs to manage Rooms
    Route::get('cinema/{id}/rooms', [\App\Http\Controllers\RoomController::class, 'index'])->name('rooms');
    Route::get('cinema/{id}/createroom', [\App\Http\Controllers\RoomController::class, 'create'])->name('createroom');
    Route::post('cinema/{id}/postroom', [\App\Http\Controllers\RoomController::class, 'postroom'])->name('postroom');
    Route::get('cinema/{id}/deleteroom/{idroom}', [\App\Http\Controllers\RoomController::class, 'deleteroom'])->name('deleteroom');
    Route::get('cinema/{id}/editroom/{idroom}', [\App\Http\Controllers\RoomController::class, 'editroom'])->name('editroom');
    Route::post('cinema/{id}/posteditroom/{idroom}', [\App\Http\Controllers\RoomController::class, 'posteditroom'])->name('posteditroom');

    // Routs to manage Movies
    Route::get('movies', [\App\Http\Controllers\MovieController::class, 'index'])->name('movies');
    Route::get('createmovie', [\App\Http\Controllers\MovieController::class, 'create'])->name('createmovie');
    Route::post('postmovie', [\App\Http\Controllers\MovieController::class, 'postmovie'])->name('postmovie');
    Route::get('deletemovie/{id}', [\App\Http\Controllers\MovieController::class, 'deletemovie'])->name('deletemovie');
    Route::get('editmovie/{id}', [\App\Http\Controllers\MovieController::class, 'editmovie'])->name('editmovie');
    Route::post('posteditmovie', [\App\Http\Controllers\MovieController::class, 'posteditmovie'])->name('posteditmovie');

    // Routs to manage Screenings
    Route::get('screenings', [\App\Http\Controllers\ScreeningController::class, 'index'])->name('screenings');
    Route::get('createscreening', [\App\Http\Controllers\ScreeningController::class, 'create'])->name('createscreening');
    Route::post('postscreening', [\App\Http\Controllers\ScreeningController::class, 'postscreening'])->name('postscreening');
    Route::get('cinimaroom',[\App\Http\Controllers\ScreeningController::class, 'getRoom'])->name('cinimaroom');
    Route::get('deletescreening/{id}', [\App\Http\Controllers\ScreeningController::class, 'deletescreening'])->name('deletescreening');
    Route::get('editscreening/{id}', [\App\Http\Controllers\ScreeningController::class, 'editscreening'])->name('editscreening');
    Route::post('posteditscreening', [\App\Http\Controllers\ScreeningController::class, 'posteditscreening'])->name('posteditscreening');

});
