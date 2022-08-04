<?php

use App\Http\Controllers\Assessment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PayrolController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginmonitorController;

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
Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// })->name('homepage');

Route::get('/', [CompanyController::class, 'home'])->name('homepage');

Route::post('assessment', [Assessment::class, 'assess'])->name('assessment');

Route::group(['middleware'=>'auth'], function(){


    Route::get('dashboard',  [HomeController::class, 'index'])->name('dashboard');
    Route::get('manage/users', [UserController::class, 'index'])->name('users');
    Route::put('user/{id}', [UserController::class, 'update'])->name('update.user');
    Route::get('user/{id}', [UserController::class, 'edit'])->name('edit.user');
        

    Route::group(['middleware' => 'company.admin'], function(){

        Route::get('user', [UserController::class, 'create'])->name('add.user');
        Route::post('user', [UserController::class, 'store'])->name('add.user');
        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('delete.user');

        Route::get('payroll', [PayrolController::class, 'index'])->name('payroll');
        Route::post('create/payrol', [PayrolController::class, 'store'])->name('add.payroll');
        Route::get('create/payrol', [PayrolController::class, 'create'])->name('create.payroll');
        Route::get('payroll/{id}', [PayrolController::class, 'edit'])->name('edit.payroll');
        Route::put('payroll/{id}', [PayrolController::class, 'update'])->name('update.payroll');
        Route::delete('payroll/{id}', [PayrolController::class, 'destroy'])->name('delete.payroll');
    });


    Route::group(['middleware' => 'cyber.admin'], function(){
        Route::get('manage/intruders', [LoginmonitorController::class, 'index'])->name('intruders');
        
    });

    Route::group(['middleware' => 'system.admin'], function(){
        Route::get('company', [CompanyController::class, 'index'])->name('companies');
        Route::delete('company/{id}', [CompanyController::class, 'destroy'])->name('delete.company');

        Route::get('awareness', [AdminController::class, 'index'])->name('awareness');
        Route::get('create/awareness', [AdminController::class, 'create'])->name('create.awareness');
        Route::put('awareness/{id}', [AdminController::class, 'update'])->name('update.awareness');
        Route::get('awareness/{id}', [AdminController::class, 'edit'])->name('edit.awareness');
        Route::post('awareness', [AdminController::class, 'store'])->name('store.awareness');
        Route::delete('awareness/{id}', [AdminController::class, 'destroy'])->name('delete.awareness');

    });


    Route::group(['middleware' => 'sub.admin'], function(){
        Route::get('payroll', [PayrolController::class, 'index'])->name('payroll');
    });


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


