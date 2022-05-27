<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\WardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [EmployeeController::class, 'index'])->name('home');
Route::get('/provinsi', [ProvincesController::class, 'index'])->name('province');
Route::get('/kecamatan', [DistrictController::class, 'index'])->name('district');
Route::get('/kelurahan', [WardController::class, 'index'])->name('ward');

Route::post('/pegawai', [EmployeeController::class, 'store'])->name('employee.store');
Route::post('/provinsi', [ProvincesController::class, 'store'])->name('province.store');
Route::post('/kecamatan', [DistrictController::class, 'store'])->name('district.store');
Route::post('/kelurahan', [WardController::class, 'store'])->name('ward.store');

Route::delete('/pegawai/{employees:id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
Route::delete('/provinsi/{provinces:id}', [ProvincesController::class, 'destroy'])->name('province.destroy');
Route::delete('/kecamatan/{districts:id}', [DistrictController::class, 'destroy'])->name('district.destroy');
Route::delete('/kelurahan/{wards:id}', [WardController::class, 'destroy'])->name('ward.destroy');

Route::put('/pegawai/{employees:id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::put('/provinsi/{provinces:id}', [ProvincesController::class, 'update'])->name('province.update');
Route::put('/kecamatan/{districts:id}', [DistrictController::class, 'update'])->name('district.update');
Route::put('/kelurahan/{wards:id}', [WardController::class, 'update'])->name('ward.update');
