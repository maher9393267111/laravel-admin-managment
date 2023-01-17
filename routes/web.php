<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Admin\PayrollController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\LeaveTypeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Staff\StaffLeaveController;
use App\Http\Controllers\Admin\AdminStatusController;
use App\Http\Controllers\Manager\ManagerLeaveController;
use App\Http\Controllers\Manager\ManagerStatusController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('users', UsersController::class);
Route::resource('user',UserController::class)->middleware('can:manage-users');
Route::resource('leaves',LeaveController::class);
Route::resource('profiles',ProfileController::class);
Route::resource('payrolls',PayrollController::class);
Route::resource('departments',DepartmentController::class)->middleware('can:manage-users');                                               
Route::resource('leavetypes',LeaveTypeController::class)->middleware('can:manage-users');
Route::resource('staffleave',StaffLeaveController::class);
Route::resource('managerleave',ManagerLeaveController::class);
   
Route::get('/approved/{id}',[AdminStatusController::class,'approved']);
Route::get('/declined/{id}',[AdminStatusController::class,'declined']);

Route::get('/hodapprove/{id}',[ManagerStatusController::class,'hodapprove']);
Route::get('/hoddeclined/{id}',[ManagerStatusController::class,'hoddeclined']);












