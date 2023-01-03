<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    EmployeesController,
    PolicyController
};
use App\Http\Controllers\{
    Employeeclientside,
    PermissionController,
    ProfileController
};

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
Route::get('/demo', function(){
    return view('admin_template.index');
 });

//admin routes
Route::middleware('auth')->prefix('adminpanal')->group(function () {
    Route::get('/', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('employees', EmployeesController::class);
    Route::resource('policy', PolicyController::class);
    Route::resource('permission', PermissionController::class);
    
});

//clent route
Route::middleware('auth')->prefix('employee')->group(function(){
    Route::get('/', function() {
        return view('employee.dashboard');
    })->name('employee.dashboard');
    Route::resource('employee', Employeeclientside::class);
});
//client route
Route::get('/', function(){
   return redirect()->route('login');
});

require __DIR__.'/auth.php';