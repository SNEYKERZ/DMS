<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/documentos', [DocumentosController::class, 'index'])->name('documentos.index');
Route::get('/documentos/create', DocumentosController::class . '@create')->name('documentos.create');
// adds a document to the database
Route::post('/documentos', DocumentosController::class .'@store')->name('documentos.store');
// returns a page that shows a full post
Route::get('/documentos/{id}', DocumentosController::class .'@show')->name('documentos.show');
// returns the form for editing a post
Route::get('/documentos/{id}/edit', DocumentosController::class .'@edit')->name('documentos.edit');
// updates a post
Route::put('/documentos/{id}', DocumentosController::class .'@update')->name('documentos.update');
// deletes a post
Route::delete('/documentos/{id}', DocumentosController::class .'@destroy')->name('documentos.destroy');