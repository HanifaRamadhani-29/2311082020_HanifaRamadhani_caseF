<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('reservasi', [ReservasiController::class,'index'])-> name('reservasi.index'); 
Route::get('reservasi/create', [ReservasiController::class,'create'])-> name('reservasi.create'); 
Route::post('reservasi', [ReservasiController::class,'store'])-> name('reservasi.store'); 
Route::get('reservasi/{id}/edit', [ReservasiController::class,'edit'])-> name('reservasi.edit'); 
Route::put('reservasi/{id}', [ReservasiController::class,'update'])-> name('reservasi.update'); 
Route::delete('reservasi/{id}', [ReservasiController::class,'destroy'])-> name('reservasi.destroy'); 

Route::get('reservasi/trash', [ReservasiController::class, 'trash'])->name('reservasi.trash');
Route::post('reservasi/{id}/restore', [ReservasiController::class, 'restore'])->name('reservasi.restore');
Route::delete('reservasi/{id}/forceDelete', [ReservasiController::class, 'forceDelete'])->name('reservasi.forceDelete');

Route::prefix('reservasi')->group(function () {
    Route::get('trash', [ReservasiController::class, 'trash'])->name('reservasi.trash');
    Route::post('{id}/restore', [ReservasiController::class, 'restore'])->name('reservasi.restore');
    Route::delete('{id}/forceDelete', [ReservasiController::class, 'forceDelete'])->name('reservasi.forceDelete');
});
