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

Route::get('/books', [\App\Http\Controllers\BooksController::class, 'all']);
Route::get('/delete/{id}', [\App\Http\Controllers\BooksController::class, 'delete']);
Route::post('/add', [\App\Http\Controllers\BooksController::class, 'add']);
Route::post('/update', [\App\Http\Controllers\BooksController::class, 'update']);
Route::get('/book/{id}', [\App\Http\Controllers\BooksController::class, 'getBook']);

//Auth::routes();

