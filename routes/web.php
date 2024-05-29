<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;

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
});




route::resource('pelanggan',customerController::class)->except('destroy')->middleware('auth'); 
route::resource('admin',adminController::class)->except('destroy','show','edit','create')->middleware('auth'); 
route::get('login',[loginController::class,'loginView'])->name('login');
route::post('login',[loginController::class,'authenticate']);
Route::post('/logout', [loginController::class, 'logout'])->name('logout');