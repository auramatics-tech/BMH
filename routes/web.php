<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\HomeController;

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

Route::get('/admin', [LoginController::class, 'index'])->name('admin.home');
Route::post('/admin', [LoginController::class, 'authenticate'])->name('admin.login');

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    
   // admin edit profile
    
   Route::get('/profile', [AdminController::class, 'index'])->name('admin.profile');
   Route::post('change-password', [AdminController::class, 'change_password'])->name('admin.change_password'); 

     //admin.terms
     Route::get('/privacy', [PrivacyController::class, 'index'])->name('admin.privacy');
     Route::get('/terms', [PrivacyController::class, 'terms'])->name('admin.terms');
     Route::post('/privacy-store', [PrivacyController::class, 'store_privacy'])->name('admin.store_privacy');
     Route::post('/terms-store', [PrivacyController::class, 'store_terms'])->name('admin.store_terms'); 


     //customers
     Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers'); 
     Route::get('/create', [CustomerController::class, 'create'])->name('admin.create'); 
     Route::post('/save-customer', [CustomerController::class, 'save_customer'])->name('admin.save_user');
     Route::get('/edit-customer/{id}', [CustomerController::class, 'edit_customer'])->name('admin.edit_user');
     Route::get('/delete-customer/{id}', [CustomerController::class, 'delete_customer'])->name('admin.delete_user');

    //Users
    Route::get('/users', [UserController::class, 'index'])->name('admin.news');
    Route::get('/user-create', [UserController::class, 'user_create'])->name('admin.user_create');  

});

//Frontend

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');




