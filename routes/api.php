<?php

use App\Http\Controllers\Api\RouteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get a list of all companies
Route::get('company/list', [RouteController::class, 'companyList']);
// localhost:8000/api/company/list (GET)

// Create a new company
Route::post('company/create', [RouteController::class, 'companyCreate']);
// localhost:8000/api/company/create (POST)

// Delete an employee
Route::post('employee/delete', [RouteController::class, 'employeeDelete']);
// localhost:8000/api/employee/delete (POST)

// Show details of a specific employee
Route::post('employee/show', [RouteController::class, 'employeeShow']);
// localhost:8000/api/employee/show?id=1 (POST)

// Update an employee's details
Route::post('employee/update', [RouteController::class, 'employeeUpdate']);
// localhost:8000/api/employee/update?id=1&name=JohnDoe&company_id=2 (POST)
