<?php

use App\Http\Middleware\Ceklevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\PerusahaanController;


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
Route::get('/',[PekerjaController::class, 'index'])->name('pegawai')->middleware('auth');


// Route::get('/pegawai',[PekerjaController::class, 'index'])->name('pegawai')->middleware('auth');

Route::get('/tambahpegawai',[PekerjaController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata',[PekerjaController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}',[PekerjaController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/editdata/{id}',[PekerjaController::class, 'editdata'])->name('editdata');

Route::get('/delete/{id}',[PekerjaController::class, 'delete'])->name('delete');

Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginuser',[LoginController::class, 'loginuser'])->name('loginuser');


Route::get('/regis',[LoginController::class, 'regis'])->name('regis');
Route::post('/regisuser',[LoginController::class, 'regisuser'])->name('regisuser');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/diri',[PekerjaController::class, 'diri'])->name('diri')->middleware('auth');

Route::get('/perusahaan',[PerusahaanController::class, 'perusahaan'])->name('perusahaan')->middleware('auth');
Route::get('/tambahperusahaan',[PerusahaanController::class, 'tambahperusahaan'])->name('tambahperusahaan');
Route::post('/insertperusahaan',[PerusahaanController::class, 'insertperusahaan'])->name('insertperusahaan');
Route::get('/tampilperusahaan/{id}',[PerusahaanController::class, 'tampilperusahaan'])->name('tampilperusahaan');
Route::post('/editperusahaan/{id}',[PerusahaanController::class, 'editperusahaan'])->name('editperusahaan');

Route::get('/hapus/{id}',[PerusahaanController::class, 'hapus'])->name('hapus');


Route::group(['middleware'=>['auth','ceklevel:admin']], function(){
    Route::get('/',[PekerjaController::class, 'index'])->name('pegawai');
    Route::get('/perusahaan',[PerusahaanController::class, 'perusahaan'])->name('perusahaan');


});










