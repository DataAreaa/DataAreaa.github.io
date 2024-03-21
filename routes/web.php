<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Session\Session;

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;



Route::get('/', [SessionController::class, 'index']);
Route::get('/Admin', [AdminController::class, 'index']);
Route::match(['get','post'],'Admin/create', [AdminController::class,'create']);
Route::get('Admin/{id}',[AdminController::class,'detail'])->where('id','[0-9]+');

Route::resource('Admin', AdminController::class)->middleware('islogin');

Route::resource('Admin', AdminController::class);
Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register'])->name('sesi.register');
Route::post('/sesi/create', [SessionController::class, 'create'])->name('sesi.create');

Route::get('/', function(){
    return view('sesi/welcome');
});
