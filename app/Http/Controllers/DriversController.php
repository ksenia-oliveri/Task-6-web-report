<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function getDriversList()
    {
        $list = [];
        foreach(file('../data/abbreviations.txt') as $line)
        {
            $drivers = explode('_', $line);
            $list[] = [$drivers[0], $drivers[1]];
        }
        return $list;
    }
}
