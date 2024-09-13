<?php

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/customers', [CustomerController::class, 'getCustomers'])->name('get.customers');
Route::get('/customers/{id}', [CustomerController::class, 'getCustomerById'])->name('get.customer');
Route::post('/customers', [CustomerController::class, 'createCustomer'])->name('create.customer');
Route::put('/customers/{id}', [CustomerController::class, 'updateCustomer'])->name('update.customer');
Route::delete('/customers/{id}', [CustomerController::class, 'deleteCustomer'])->name('delete.customer');
