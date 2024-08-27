<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;

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

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//rotte auto
// Route::get('/cars', [CarController::class, 'carIndex'])->name('car.index');

//inserimento dati
Route::get('/contattaci', [PublicController::class, 'contactUs'])->name('contact.us');
Route::post('/contattaci/submit', [PublicController::class, 'contactUsSubmit'])->name('contact.submit');
Route::get('/thank-you', [PublicController::class, 'thankYou'])->name('thank.you');

//pagina profilo utente
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::delete('/cancella/utente', [UserController::class, 'destroy'])->name('user.delete');

//LIBRI
Route::get('/crea-libro', [BookController::class, 'create'])->name('book.create');
Route::post('/crea-libro/submit', [BookController::class, 'store'])->name('book.store');
Route::get('/indice/libri', [BookController::class, 'index'])->name('book.index');
Route::get('/dettaglio-libro/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/modifica-libro/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/modifica-libro/{book}/submit', [BookController::class, 'update'])->name('book.update');
Route::delete('/cancella-libro/{book}', [BookController::class, 'destroy'])->name('book.delete');


//Categorie
Route::get('/crea-categoria', [CategoryController::class, 'create'])->name('category.create');
Route::post('/crea-categoria/submit', [CategoryController::class, 'store'])->name('category.store');
Route::get('/indice/categorie', [CategoryController::class, 'index'])->name('category.index');
Route::get('/dettaglio/categoria/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/modifica-categoria/{category}', [CategoryController::class, 'edit'])->name('category.edit');
//metodo put per la modifica di un dato già esistente nel db
Route::put('/modifica-categoria/{category}/submit', [CategoryController::class, 'update'])->name('category.update');
//delete - sottometodo di post che cancella l'elemento dal database
Route::delete('/cancella-categoria/{category}', [CategoryController::class, 'destroy'])->name('category.delete');
