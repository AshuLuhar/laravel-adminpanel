<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Models\Company;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/company', [CompanyController::class, 'index']);
// Route::post('/company', [CompanyController::class, 'add']);
// Route::get('/company-add', [CompanyController::class, 'create']);
// Route::get('/companies/{company}/employees/{employee}/edit','EmployeeController@edit')->name('employees.edit');
// Route::put('/companies/{company}/employees/{employee}/update','EmployeeController@update')->name('employees.update');
// Route::delete('/companies/{company}/employees/{employee}/delete','EmployeeController@destroy')->name('employees.destroy');


// Route::get('/company-edit/{id}', [CompanyController::class, 'edit']);


// Route::put('/company-edit/update', [CompanyController::class, 'update']);

// Route::delete('/company/{id}/delete', [CompanyController::class, 'destroy']);


// Route::get('/employee', [EmployeeController::class,'show']);
// Route::get('/employee-edit', [EmployeeController::class, 'create']);
// Route::post('/employee', [EmployeeController::class, 'add']);

// Route::get('/company-edit', function () {
//     return view('company-edit');
// });
Route::resource('/employees', EmployeeController::class);

Route::resource('/companies', CompanyController::class);
