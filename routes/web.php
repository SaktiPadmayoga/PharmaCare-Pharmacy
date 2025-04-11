<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('adminDashboard/customers', [UserController::class, 'showCustomers'])->name('admin.customers');
Route::get('adminDashboard/staff', [UserController::class, 'showStafs'])->name('admin.staffs'); 