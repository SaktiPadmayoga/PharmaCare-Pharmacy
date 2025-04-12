<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SupplierController;
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
Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
Route::post('/medicine', [MedicineController::class, 'store'])->name('medicine.store');
Route::put('/medicine/{id}', [MedicineController::class, 'update'])->name('medicine.update');
Route::delete('/medicine/{id}', [MedicineController::class, 'destroy'])->name('medicine.destroy');