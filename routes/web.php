<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawController;
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
    Route::resource('deposits',DepositController::class);
    Route::get('/deposits/mainindex/{id}',[DepositController::class,'mainindex'])->name('deposits.mainindex');
    Route::get('/deposits/maincreate/{id}',[DepositController::class,'maincreate'])->name('deposits.maincreate');

    Route::get('withdraws/main/{id}',[WithdrawController::class,'index'])->name('withdraws.main');
    Route::get('withdraws/main/create/{id}',[WithdrawController::class,'create'])->name('withdraws.main.create');
    Route::resource('withdraws',WithdrawController::class);
    
    // Route::post('/deposits/save',[DepositController::class,'store'])->name('deposits.store');
    // Route::delete('/deposits/delete/{id}',[DepositController::class,'destroy'])->name('deposits.destroy');
    // Route::post('departments/store',[DepartmentController::class,'store'])->name('departments.store');
});
