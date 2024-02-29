<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function BuildReport()
    {
        $report = [];
        foreach(file('../data/abbreviations.txt') as $line)
        {
            $names = explode('_', $line);
            foreach(file('../data/start.log') as $start)
            {
                $driverStart = explode('_', $start);
                if(mb_substr($driverStart[0], 0, 3) == $names[0])
                {
                    foreach(file('../data/end.log') as $end)
                    {
                        $driverEnd = explode('_', $end);
                        if($driverStart[0] == $driverEnd[0])
                        {
                            $startTime = DateTime::createFromFormat('H:i:s.u', trim($driverStart[1]));
                            $endTime = DateTime::createFromFormat('H:i:s.u', trim($driverEnd[1]));
                            $timeDiff = $endTime->diff($startTime)->format('%H:%i:%s.%f');
                        }    
                    }   
                }    
            }
           $report[] = ['short-name' => $names[0], 'name' => $names[1], 'car' => trim($names[2]), 'time' => $timeDiff];

           usort($report, function($a, $b)
           {
            return $a['time'] > $b['time'];
           });   
        }

        return view('report', ['report' => $report]);
    }

    public function getDriversList()
    {
        $listOfDrivers = [];
        foreach(file('../data/abbreviations.txt') as $line)
        {
            $names = explode('_', $line);
            $listOfDrivers[] = ['short-name' => $names[0], 'name' => $names[1]];
        }
        return view('drivers', ['drivers' => $listOfDrivers]);
    }

}
