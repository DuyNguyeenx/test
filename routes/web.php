<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('')->group(function() {
    Route::get('/',[EmployeeController::class,'index'])->name('employee.index');
    Route::get('/search',[EmployeeController::class,'search'])->name('employee.search');
    Route::match(['GET','POST'],'/create',[EmployeeController::class,'store'])->name('employee.create');
    Route::match(['GET','POST'],'/update/{id}',[EmployeeController::class,'update'])->name('employee.edit');
    Route::get('/delete/{id}',[EmployeeController::class,'delete'])->name('employee.delete');
});
