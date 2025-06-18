<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AuthController;


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
Route::get('company/{company}/person/create', [PersonController::class, 'create'])->name('person.create');
Route::post('person/store', [PersonController::class, 'store'])->name('person.store');


Route::get('person/{person}', [PersonController::class, 'show'])->name('person.show');
Route::get('person/{person}/edit', [PersonController::class, 'edit'])->name('person.edit');

Route::patch('/person/{person}', [PersonController::class, 'update'])->name('person.update');
Route::delete('person/{person}', [PersonController::class, 'destroy'])->name('person.destroy');



// 案件管理
Route::get('item/index', [ItemController::class, 'index'])->name('item.index');

Route::patch('items/{company}', [ItemController::class, 'update'])->name('item.update');

    // 追加
Route::patch('items/{company}/attach', [ItemController::class, 'attach'])->name('item.attach');
Route::patch('items/{company}/detach', [ItemController::class, 'detach'])->name('item.detach');


// ステータス
Route::get('status/index', [StatusController::class, 'index'])->name('status.index');
Route::get('status/create', [StatusController::class, 'create'])->name('status.create');
Route::post('status/store', [StatusController::class, 'store'])->name('status.store');


Route::get('status/{status}', [StatusController::class, 'show'])->name('status.show');
Route::get('status/{status}/edit', [StatusController::class, 'edit'])->name('status.edit');
Route::patch('/status/{status}', [StatusController::class, 'update'])->name('status.update');


// ログイン
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');