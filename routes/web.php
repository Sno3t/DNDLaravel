<?php


use App\Http\Controllers\CharacterController;
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

// returns the home page with all posts
Route::get('/', [CharacterController::class, 'index'])->name('character.index');

// returns the form for adding a post
//Route::get('/character/create', CharacterController::class . '@create')->name('character.create');
Route::get('/character/create', [CharacterController::class, 'create'])->name('character.create');

// adds a post to the database
//Route::post('/character', CharacterController::class .'@store')->name('character.store');
Route::post('/character', [CharacterController::class, 'store'])->name('character.store');

// returns a page that shows a full post
//Route::get('/character/{id}', CharacterController::class .'@show')->name('character.show');
Route::get('/character/{id}', [CharacterController::class, 'show'])->name('character.show');

// returns the form for editing a post
//Route::get('/character/{id}/edit', CharacterController::class .'@edit')->name('character.edit');
Route::get('/character/{id}/edit', [CharacterController::class, 'edit'])->name('character.edit');

// updates a post
//Route::put('/character/{post}', CharacterController::class .'@update')->name('character.update');
Route::put('/character/{id}', [CharacterController::class, 'update'])->name('character.update');

// deletes a post
//Route::delete('/character/{post}', CharacterController::class .'@destroy')->name('character.destroy');
Route::delete('/character/{id}', [CharacterController::class, 'destroy'])->name('character.destroy');

