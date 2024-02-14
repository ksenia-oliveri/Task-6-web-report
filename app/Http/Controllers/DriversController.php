<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function getDriversList()
    {
        $list = [];
        $obj = new ReportController;
        foreach($obj->BuildReport() as $line)
        {
            $driverArr = explode(' | ', $line);
            foreach(file('../data/abbreviations.txt') as $line2){
                $driverName = explode('_', $line2);
                if($driverArr[0] == $driverName[1])
                {
                    $list[] = [$driverName[0], $driverArr[0]];
                }
                
            }
           
        }
        return $list;
    }
}
