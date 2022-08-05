<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
/*
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

Route::get('/',[HomeController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//hak akses untuk admin
Route::group(['middleware' =>'admin'], function(){

    //router guru
    Route::get('/guru',[GuruController::class,'index'])->name('guru');

    Route::get('/guru/detail/{id_guru}',[GuruController::class,'detail']);
    
    Route::get('/guru/add',[GuruController::class,'add']);
    
    Route::post('/guru/insert',[GuruController::class,'insert']);
    
    Route::get('/guru/edit/{id_guru}',[GuruController::class,'edit']);
    
    Route::post('/guru/update/{id_guru}',[GuruController::class,'update']);
    
    Route::get('/guru/delete/{id_guru}',[GuruController::class,'delete']);
    
    Route::get('/guru/print',[GuruController::class,'print']);

     //router siswa
     Route::get('/siswa',[SiswaController::class,'index'])->name('siswa');
 
     Route::get('/siswa/add',[SiswaController::class,'add']);
     
     Route::post('/siswa/insert',[SiswaController::class,'insert']);
 
     Route::get('/siswa/delete/{id_siswa}',[SiswaController::class,'delete']);
    
    
    
});

//hak akses untuk user
Route::group(['middleware' => 'user'], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');

     
    
});

