<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\books\BooksController;
use App\Http\Controllers\divisions\DivisionController;

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

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/divisiones', [DivisionController::class, 'index']);

Route::resource('books', BooksController::class)->names([
    'index' => 'books.index',
    'create' => 'books.create',
    'store' => 'books.store',
    'show' => 'books.show',
    'edit' => 'books.edit',
    'update' => 'books.update',
    'destroy' => 'books.destroy',
]);