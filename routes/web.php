<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

Route::get('/',[CrudController::class,'showData'])->name('data.show');
Route::get('/add-dara',[CrudController::class,'addData'])->name('data.add');
Route::post('/store-data',[CrudController::class,'storeData'])->name('data.store');
Route::get('/edit-data/{id}',[CrudController::class,'editData'])->name('data.edit');
Route::post('/update-data/{id}',[CrudController::class,'updateData'])->name('data.update');
Route::get('/delete-data/{id}',[CrudController::class,'deleteData'])->name('data.delete');
