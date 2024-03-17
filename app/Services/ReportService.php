<?php
namespace App\Services;
use DateTime;
class ReportService
{   
    const DIR_1 = '/home/ksjusha/Documents/Task-6';
    public function BuildReport()
    {   
        $report = [];
        foreach(file(self::DIR_1 . '/Data/abbreviations.txt') as $line)
        {
            $names = explode('_', $line);
            foreach(file(self::DIR_1 . '/Data/start.log') as $start)
            {
                $driverStart = explode('_', $start);
                if(mb_substr($driverStart[0], 0, 3) == $names[0])
                {
                    foreach(file(self::DIR_1 . '/Data/end.log') as $end)
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
           $report['driver'] = ['short-name' => $names[0], 'name' => $names[1], 'car' => trim($names[2]), 'time' => $timeDiff];

           usort($report, function($a, $b)
           {
            return $a['time'] > $b['time'];
           });   
        }
        return $report; 
    }

}