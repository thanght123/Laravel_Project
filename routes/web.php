<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;

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
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::prefix('categories')->name('categories.')->group(function(){
	Route::get('',[CategoryController::class, 'index'])->name('index');
    Route::get('/create',[CategoryController::class, 'create'])->name('create');
    Route::post('/create',[CategoryController::class, 'store'])->name('store');
    Route::delete('/delete', [CategoryController::class, 'destroy'])->name('delete');
    Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}',[CategoryController::class, 'update'])->name('edit.update');
});
});
Route::get('login',
    [LoginController::class,'login']
)->name('login');

Route::post('login',
    [LoginController::class,'authenticate']
)->name('login.authenticate');

Route::get('logout',
    [LoginController::class,'logout']
)->name('logout');

Route::get('register',
    [LoginController::class,'register']
)->name('register');

Route::post('register',
    [LoginController::class,'store']
)->name('register.post');