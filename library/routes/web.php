<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataBasesController;

Route::get('/story', [DataBasesController::class, 'Feeling'])->name('story');

Route::get('/readers', [DataBasesController::class, 'Feeling'])->name('readers');

Route::get('/books', [DataBasesController::class, 'Feeling'])->name('books');

Route::get('/genres', [DataBasesController::class, 'Feeling'])->name('genres');

Route::get('/authors', [DataBasesController::class, 'Feeling'])->name('authors');

Route::get('/create', [DataBasesController::class, 'Create'])->name('create');

Route::post('/create', [DataBasesController::class, 'CreateSave']);

Route::get('/update', [DataBasesController::class, 'Update'])->name('update');

Route::post('/update', [DataBasesController::class, 'UpdateSave']);

Route::post('/delete', [DataBasesController::class, 'Delete'])->name('delete');