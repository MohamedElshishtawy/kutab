<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('kutab', App\Http\Controllers\KutabController::class);
    Route::resource('groups', App\Http\Controllers\GroupController::class);
    Route::resource('sheikhs', App\Http\Controllers\SheikhController::class);
    Route::delete('/sheikh-groups', [App\Http\Controllers\SheikhGroupController::class, 'destroy'])->name('sheikh_groups.destroy');

});
