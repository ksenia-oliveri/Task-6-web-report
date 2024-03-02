<?php

namespace App\Http\Controllers;

use App\Services\ReportService;



class ReportController extends Controller
{   
    public function GetReport()
    {
        $obj = new ReportService();
        $report = $obj->BuildReport();

        return view('report', ['report'=> $report, 'order' => request('order')]);
    }
    
    public function GetDriversList()
    {
        $obj = new ReportService();
        $names = $obj->BuildReport();

        return view('drivers', ['drivers' => $names, 'order' => request('order')]);
    
    }

    public function GetDriverInfo()
    {
        $obj = new ReportService();
        $driverInfo = $obj->BuildReport();

        return view('driverInfo', ['driverInfo' => $driverInfo, 'driver_id' => request('driver_id')]);
    }

}
