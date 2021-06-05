<?php

use App\Http\Controllers\Master\HomeController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\Master\PermissionController;
use App\Http\Controllers\Master\UserController;


use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class,'index']);
Route::get('rutas', [HomeController::class,'rutas'])->name('rutas');

Route::resource('roles', RoleController::class)->names('roles');
Route::resource('permissions', PermissionController::class)->names('permissions');
Route::resource('users', UserController::class)->names('users');




