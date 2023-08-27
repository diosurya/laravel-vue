<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MutationController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
	Route::get('/me', [AuthController::class, 'me']);

	//Logout
	Route::get('/logout', [AuthController::class, 'logout']);
});

// Login
Route::post('/login', [AuthController::class, 'login']);

// Customer
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/{id}', [CustomerController::class, 'show']);
Route::post('/customer', [CustomerController::class, 'store']);
Route::patch('/customer/{id}', [CustomerController::class, 'update']);
Route::delete('/customer/{id}', [CustomerController::class, 'destroy']);
Route::get('/search/{nama}', [CustomerController::class, 'search']);


// Alamat
Route::get('/alamat', [AlamatController::class, 'index']);
Route::get('/alamat/{id}', [AlamatController::class, 'detail']);

// Akun
Route::get('/akun', [AkunController::class, 'index']);
Route::post('/akun', [AkunController::class, 'store']);
Route::delete('/akun/{id}', [AkunController::class, 'destroy']);

// Transaction
Route::post('/transactions/transfer', [TransactionController::class, 'transfer']);

// Mutation
Route::get('/mutations', [MutationController::class, 'index']);
