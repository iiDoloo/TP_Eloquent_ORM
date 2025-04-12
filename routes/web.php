<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ContactController::class,'index']);

Route::get('/contacts/trashed',[ContactController::class,'trashed'])->name('trashed');
Route::post('/contacts/trashed/{id}',[ContactController::class,'restoreTrashed'])->name('restore_trashed');
Route::delete('/contacts/trashed/{id}',[ContactController::class,'destroyTrashed'])->name('destroy_trashed');
Route::resource('contacts',ContactController::class);


Route::get('/companies/trashed',[CompanyController::class,'trashed'])->name('trashed_companies');
Route::post('/companies/trashed/{id}',[CompanyController::class,'restoreTrashed'])->name('restore_trashed_company');
Route::delete('/companies/trashed/{id}',[CompanyController::class,'destroyTrashed'])->name('destroy_trashed_company');
Route::resource('companies',CompanyController::class);