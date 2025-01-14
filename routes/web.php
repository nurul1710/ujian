<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\bajuController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\sewaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('dashboard',[
        "title"=>"Dashboard"
    ]);
})->middleware('auth');





route::resource('admin',adminController::class)->except('destroy','show','edit','create')->middleware('auth');
route::resource('baju',bajuController::class)->middleware('auth');
Route::POST('carii',[bajuController::class,'cari'])->name('caribaju')->middleware('auth'); 
route::get('login',[loginController::class,'loginView'])->name('login');
route::post('login',[loginController::class,'authenticate']);
Route::post('/logout', [loginController::class, 'logout'])->name('logout')->middleware('auth');
Route::resource('sewa', sewaController::class)->middleware('auth');