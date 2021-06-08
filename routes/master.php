<?php

use App\Http\Controllers\Master\BankController;
use App\Http\Controllers\Master\BrandController;
use App\Http\Controllers\Master\CondominioApartmentController;
use App\Http\Controllers\Master\CondominioController;
use App\Http\Controllers\Master\HomeController;
use App\Http\Controllers\Master\InterestController;
use App\Http\Controllers\Master\RoleController;
use App\Http\Controllers\Master\PermissionController;
use App\Http\Controllers\Master\SocialController;
use App\Http\Controllers\Master\UserController;


use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class,'index']);
Route::get('rutas', [HomeController::class,'rutas'])->name('rutas');

Route::resource('roles', RoleController::class)->names('roles');
Route::resource('permissions', PermissionController::class)->names('permissions');
Route::resource('users', UserController::class)->names('users');
Route::resource('condominios', CondominioController::class)->names('condominios');
Route::resource('brands', BrandController::class)->names('brands');
Route::resource('socials', SocialController::class)->names('socials');
Route::resource('banks', BankController::class)->names('banks');
Route::resource('interests', InterestController::class)->names('interests');
Route::resource('condominios.apartments', CondominioApartmentController::class)->names('condominios.apartments');










