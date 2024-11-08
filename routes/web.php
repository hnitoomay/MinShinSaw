<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;

Route::redirect('/', 'loginPage');
Route::get('loginPage',[AuthController::class,'login'])->name('auth#login');
Route::get('registerPage',[AuthController::class,'register'])->name('auth#register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'])->group(function () {

        Route::get('cole',[AuthController::class,'cole'])->name('cole');

    Route::middleware(['admin_auth'])->group(function(){

        Route::get('admin/company', [CompaniesController::class,'company'])->name('home#company');
        Route::get('admin/companyCreate',[CompaniesController::class,'companyCreate'])->name('company#create');
        Route::post('admin/companyInsert',[CompaniesController::class,'companyInsert'])->name('company#insert');
        route::get('admin/companyDelete/{id}',[CompaniesController::class, 'companyDelete'])->name('company#delete');
        route::get('admin/companyEdit/{id}',[CompaniesController::class,'companyEdit'])->name('company#edit');
        route::post('admin/companyUpdate/{id}',[CompaniesController::class, 'companyUpdate'])->name('company#update');

        route::prefix('admin')->group(function(){
            Route::get('employee',[EmployeesController::class, 'employee'])->name('home#employee');
            Route::get('employeeCreate',[EmployeesController::class,'employeeCreate'])->name('employee#create');
            Route::post('employeeInsert',[EmployeesController::class,'employeeInsert'])->name('employee#insert');
            route::get('employeeDelete/{id}',[EmployeesController::class, 'employeeDelete'])->name('employee#delete');
            route::get('employeeEdit/{id}',[EmployeesController::class,'employeeEdit'])->name('employee#edit');
            route::post('employeeUpdate/{id}',[EmployeesController::class, 'employeeUpdate'])->name('employee#update');
        });
    });

    Route::middleware(['user_auth'])->group(function(){
        Route::get('userPage',[CompaniesController::class,'user'])->name('user#page');

    });



});


