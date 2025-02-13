<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FibonacciController;
use App\Http\Controllers\InterfaceController;

Route::get('/desafio1', [FibonacciController::class, 'desafio1']);
Route::get('/desafio2/{num}', [FibonacciController::class, 'desafio2']);
Route::get('/desafio3', [FibonacciController::class, 'desafio3']);
Route::get('/desafio4', [FibonacciController::class, 'desafio4']);
Route::get('/desafio5/{string}', [FibonacciController::class, 'desafio5']);

Route::get('/', [InterfaceController::class, 'index']);
