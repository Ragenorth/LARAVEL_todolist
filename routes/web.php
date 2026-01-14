<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/', [TodoController::class, 'index'])->name('todos.index');

//when POST request, to /add, run the store() method, in TodoController class, name 
Route::post('/add', [TodoController::class, 'store'])->name('todos.store');
Route::get('/delete/{index}', [TodoController::class, 'delete'])->name('todos.delete');
Route::get('/clear', [TodoController::class, 'clearSession'])->name('todos.clear');
