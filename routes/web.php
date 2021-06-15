<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('limpiar', function () {
    $p = url()->previous();
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Session::flash('success','Todo limpio');
});


Route::get('storage-link', function () {
    if (file_exists(public_path('storage'))) {
        Session::flash('success','The "public/storage" directory already exists.');
        return Rediret::back();
    }

    app('files')->link(storage_path('app/public'), public_path('storage')
    );
    Session::flash('success','The [public/storage] directory has been linked.');

    return Redirect::back();
});

Route::get('storagelink', function() {
    Artisan::call('storage:link');
    Session::flash('success','The [public/storage] directory has been linked.');

    return Redirect::back();
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
