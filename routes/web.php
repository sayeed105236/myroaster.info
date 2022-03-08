<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});
Route::get('/super-admin/home', [HomeController::class, 'SuperadminHome'])->name('super-admin.home')->middleware('super_admin');
//Company Routes
Route::get('/super-admin/companies', [CompanyController::class, 'index'])->name('companies')->middleware('super_admin');

Route::group(['middleware' => ['super_admin']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});
//Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
// admin/company routes
Route::get('admin/home', [HomeController::class, 'SuperadminHome'])->name('admin.home')->middleware('is_admin');
