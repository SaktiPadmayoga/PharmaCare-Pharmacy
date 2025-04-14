<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;









Route::get('Pharmacare', [HomeController::class, 'getRandomMedicine'])->name('homepage');
Route::get('Pharmacare/Catalogue', [HomeController::class, 'getAllMedicine'])->name('catalogue');
Route::get('Pharmacare/Catalogue/Filter', [HomeController::class, 'sortByCategory'])->name('catalogue.filter');
Route::get('/medicine/search', [MedicineController::class, 'search'])->name('medicines.search');
Route::get('/medicine', [MedicineController::class, 'show'])->name('medicine.show');


Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('adminDashboard/customers', [UserController::class, 'showCustomers'])->name('admin.customers');
Route::get('adminDashboard/staff', [UserController::class, 'showStafs'])->name('admin.staffs');
Route::get('adminDashboard/suppliers', [SupplierController::class, 'index'])->name('admin.suppliers');
Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
Route::get('adminDashboard/medicines', [MedicineController::class, 'index'])->name('admin.medicines');
Route::post('/medicine', [MedicineController::class, 'store'])->name('medicine.store');
Route::put('/medicine/{id}', [MedicineController::class, 'update'])->name('medicine.update');
Route::delete('/medicine/{id}', [MedicineController::class, 'destroy'])->name('medicine.destroy');
Route::get('adminDashboard/procurements', [ProcurementController::class, 'index'])->name('admin.procurements'); 
Route::post('/procurement', [ProcurementController::class, 'store'])->name('procurement.store');
Route::get('/procurement/{id}', [ProcurementController::class, 'show'])->name('procurement.show'); 
Route::put('/procurement/{id}', [ProcurementController::class, 'update'])->name('procurement.update');
Route::delete('/procurement/{id}', [ProcurementController::class, 'destroy'])->name('procurement.destroy');