<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;
use App\Models\todo;


 Route::get('/', [todoController::class, 'index']);
 route::prefix('todos')->name('todos.')->controller(TodoController::class)->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('index');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/', [TodoController::class, 'store'])->name('store');
    Route::get('/{todo}/edit', [TodoController::class, 'edit'])->name('edit');
    Route::put('/{todo}', [TodoController::class, 'update'])->name('update');
    Route::delete('/{todo}', [TodoController::class, 'destroy'])->name('destroy');
});