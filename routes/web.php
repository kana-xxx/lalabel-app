<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PersonController;

// Route::get('/', function () {
//     return view('welcome');
// });


// 企業管理
Route::get('/', [CompanyController::class, 'index'])->name('company.index');
Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('company/store', [CompanyController::class, 'store'])->name('company.store');

Route::get('company/{company}', [CompanyController::class, 'show'])->name('company.show');
Route::get('company/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
Route::patch('/company/{company}', [CompanyController::class, 'update'])->name('company.update');
Route::delete('company/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');

Route::post('company/register', [CompanyController::class, 'register'])->name('company.register');


// 担当者管理
Route::get('person/index', [PersonController::class, 'index'])->name('person.index');
Route::get('person/create', [PersonController::class, 'create'])->name('person.create');
Route::post('person/store', [PersonController::class, 'store'])->name('person.store');


Route::get('person/{person}', [PersonController::class, 'show'])->name('person.show');
Route::get('person/{person}/edit', [PersonController::class, 'edit'])->name('person.edit');

Route::patch('/person/{person}', [PersonController::class, 'update'])->name('person.update');
Route::delete('person/{person}', [PersonController::class, 'destroy'])->name('person.destroy');