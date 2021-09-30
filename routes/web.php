<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Models\Companies;
use App\Models\Employees;

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
    return view('Frontend.login');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function(){
    Route::get('/dashboard',function(){
        $data['ccount'] = Companies::all();
        $data['ecount'] = Employees::all();
        return view('Backend.dashboard',$data);
    })->name("admin.index");
    Route::resource('company', CompaniesController::class);
    Route::resource('employee', EmployeesController::class);
});
