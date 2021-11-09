<?php

use App\Http\Controllers\Admin\Homecontroller;
use Illuminate\Support\Facades\Route;



Route::get('', [Homecontroller::class,'index'])->name('admin');

Route::get('/gestion', [HomeController::class,'gestion'])->name('gestion');





