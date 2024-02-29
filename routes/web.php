<?php

use App\Http\Controllers\DriversController;
use App\Http\Controllers\DriversInfo;
use App\Http\Controllers\DriversInfoController;
use App\Http\Controllers\ReportController;
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

Route::get('/report', [ReportController::class, 'BuildReport'])->name('report');

Route::get('/report/drivers', [ReportController::class, 'getDriversList'])->name('report.drivers');

//Route::get('/report/drivers/', [ReportController::class, 'BuildReport'])->name('drivers.info');


// Route::view('/', 'welcome');
