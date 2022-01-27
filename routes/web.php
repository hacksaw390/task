<?php

use App\Models\Employee;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Employee

Route::get('/employee-index', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee-index');
Route::get('/create-employee', [App\Http\Controllers\EmployeeController::class, 'create'])->name('create-employee');
Route::post('/store-employee', [App\Http\Controllers\EmployeeController::class, 'store'])->name('store-employee');
Route::get('/edit-employee/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('edit-employee');
Route::post('/update-employee', [App\Http\Controllers\EmployeeController::class, 'update'])->name('update-employee');

// company
Route::get('/index', [App\Http\Controllers\CompanyController::class, 'index'])->name('index');
Route::get('/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('store');
Route::get('/edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('edit');
Route::post('/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('update');


Route::get('/hello', [App\Http\Controllers\HomeController::class, 'hello'])->name('hello');
