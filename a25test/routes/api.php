<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('employees', [EmployeeController::class, 'store']);

Route::post('transactions', [TransactionController::class, 'store']);
Route::get('transactions', [TransactionController::class, 'show']);
Route::delete('transactions', [TransactionController::class, 'delete']);