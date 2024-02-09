<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriversInfoController extends Controller
{
    public function getDriverInfo()
    {   
      $result = [];
      $objInfo = new ReportController();
      foreach($objInfo->BuildReport() as $line)
      {
        $driverArr = explode(' | ', $line);
        $objNames = new DriversController();
        foreach($objNames->getDriversList() as $names)
        {
            if($names[1] == $driverArr[0])
            {
                $result[] = [$names[0], $driverArr[0], $driverArr[1], $driverArr[2]];
            }
        }
      } 
      return $result;
    }
}

