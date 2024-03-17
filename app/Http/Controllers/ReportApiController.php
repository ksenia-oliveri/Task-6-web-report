<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Http\Request;
use SimpleXMLElement;

class ReportApiController extends Controller
{
    public function getFormat()
    {
        $obj = new ReportService();
        $report = $obj->BuildReport();

        $xml = new SimpleXMLElement('<root/>');
        array_walk_recursive($report, function($value, $key) use ($xml){
            $xml->addChild($key, $value);

        });

        $xml->asXML('report_XML_Format.xml');

        return view('reportFormat', ['report' => $report, 'format' => request('format')]);
    }
    

}
