<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\backsite\EmailController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SendPromotionController;
use App\Http\Controllers\UserController;
use App\Mail\TestMail;
use App\Models\Attendance;
use App\Models\Payroll;
use App\Models\SendPromotion;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect to login if user is not authenticated
Route::get('/', function () {
    return redirect('/dashboard');
});

// Dashboard route, only accessible by authenticated users
Route::get('/dashboard', function () {
    return view('admin.blank.index');
})->name('dashboard');

// Route untuk Submenu 1
Route::get('/submenu1', [AdminController::class, 'submenu1'])->name('submenu1');

Route::resource('users', UserController::class);

Route::resource('roles', RoleController::class);

Route::resource('departments', DepartmentController::class);

Route::resource('employees', EmployeeController::class);

Route::resource('payroll', PayrollController::class);

Route::resource('leave', LeaveController::class);

Route::resource('attendance', AttendanceController::class);

Route::resource('promotions', PromotionController::class);

Route::prefix('send_promotions')->name('send_promotions.')->group(function () {
    Route::get('/', [SendPromotionController::class, 'index'])->name('index');       
    Route::get('/create', [SendPromotionController::class, 'create'])->name('create'); 
    Route::post('/', [SendPromotionController::class, 'store'])->name('store');        
    Route::get('/{sendPromotion}/edit', [SendPromotionController::class, 'edit'])->name('edit'); 
    Route::put('/{sendPromotion}', [SendPromotionController::class, 'update'])->name('update'); 
    Route::delete('/{sendPromotion}', [SendPromotionController::class, 'destroy'])->name('destroy');
});

// Email route
Route::get('kirim-email', [EmailController::class, 'send']);
