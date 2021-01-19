<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepositController;
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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
// Route::get('/dashboard', [DepartmentController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DepartmentController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () { 
    Route::resource('departments',DepartmentController::class);
    Route::get('/deposits/{id}',[DepositController::class,'index'])->name('deposits.index');
    // Route::post('departments/store',[DepartmentController::class,'store'])->name('departments.store');
});
