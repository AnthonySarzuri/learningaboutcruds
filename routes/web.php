<?php

use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PeopleController::class, 'index'])->name('people.index');
Route::get('/create',[PeopleController::class, 'create'])->name('people.create');
Route::post('/store',[PeopleController::class, 'store'])->name('people.store');
Route::get('/edit/{id}',[PeopleController::class, 'edit'])->name('people.edit');
Route::get('/show/{id}',[PeopleController::class, 'show'])->name('people.show');
Route::put('/update/{id}',[PeopleController::class, 'update'])->name('people.update');
Route::delete('/destroy/{id}',[PeopleController::class, 'destroy'])->name('people.destroy');