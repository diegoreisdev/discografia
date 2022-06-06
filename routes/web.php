<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FaixaController;
use Illuminate\Support\Facades\Route;

/**
 * ROTAS DO ALBUM
 ********************************************************************************************************/
Route::redirect('/', 'discografia');
Route::get('discografia',                  [AlbumController::class, 'index'])->name('discografia.index');
Route::get('discografia/create',           [AlbumController::class, 'create'])->name('discografia.create');
Route::post('discografia/store',           [AlbumController::class, 'store'])->name('discografia.store');
Route::get('discografia/{album}/edit',     [AlbumController::class, 'edit'])->name('discografia.edit');
Route::put('discografia/{album}/update',   [AlbumController::class, 'update'])->name('discografia.update');
Route::get('discografia/{album}/destroy',  [AlbumController::class, 'destroy'])->name('discografia.destroy');

/**
 * ROTAS DAS FAIXAS
 ********************************************************************************************************/
Route::get('faixa/{id}/create',             [FaixaController::class,  'create'])->name('faixa.create');
Route::post('faixa/{faixa}/store',          [FaixaController::class,  'store'])->name('faixa.store');
Route::get('faixa/{faixa}/edit',            [FaixaController::class,  'edit'])->name('faixa.edit');
Route::put('faixa/{faixa}/update',          [FaixaController::class,  'update'])->name('faixa.update');
Route::get('faixa/{faixa}/destroy',         [FaixaController::class,  'destroy'])->name('faixa.destroy');
