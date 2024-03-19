<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\ReportService;
use SimpleXMLElement;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Report of Monaco racing 2018",
 *      description="List of drivers",
 * )
 */
class ReportApiController extends Controller
{   

/**
     * @OA\Get(
     *      path="/api/v1/report",
     *      operationId="getReport",
     *      tags={"Report"},
     *      summary="Get list of drivers",
     *      description="Returns list of drivers",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of drivers
     */

    public function getFormat()
    {
        $obj = new ReportService();
        $report = $obj->BuildReport();

       
        $xml = new SimpleXMLElement('<drivers/>');    
            foreach($report as $driver)
            {   
                foreach($driver as $key => $value)
                {
                    $xml->addChild($key, $value); 
                }
            }  
        
         $xml->asXML('report_XML_Format.xml');

        return view('reportFormat', ['report' => $report, 'format' => request('format')]);
    }
    

}
