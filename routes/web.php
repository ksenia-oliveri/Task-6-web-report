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

Route::view('/report', 'report');

Route::view('/report/drivers', 'drivers');

Route::get('report/drivers/{id}', function(string $id){
    $obj = new DriversInfoController();
    $info = [];
    foreach($obj->getDriverInfo() as $line)
    {
        if($id == $line[0])
        {
            $info[] = [$line[1], $line[2], $line[3]];
        }
    }
    foreach($info as $driver)
    {
        $result = implode(' | ', $driver);
    }
    echo $result;
    
})->name('driversInfo');

// Route::view('/', 'welcome');
