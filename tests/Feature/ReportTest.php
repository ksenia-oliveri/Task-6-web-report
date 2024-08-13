<?php

namespace Tests\Feature;

use App\Http\Controllers\api\ReportApiController;
use App\Services\ReportService;
use Tests\TestCase;

class ReportTest extends TestCase
{
    public function test_reportpage_contains_report(): void
    {
        $response = $this->get('/report');

        $response->assertStatus(200);

        $response->assertSee('Web report of Monaco 2018 Racing');

        $response->assertSee('Sergio Perez | FORCE INDIA MERCEDES | 01:1:12.848000');
    }

    public function test_driverpage_contains_list_of_drivers(): void
    {
        $response = $this->get('/report/drivers');

        $response->assertStatus(200);

        $response->assertSee('List of drivers');

        $response->assertSee('Lewis Hamilton');
    }

    public function test_driver_info_page_contains_info_about_the_driver(): void
    {
        $response = $this->get('/report/drivers/info');

        $response->assertStatus(200);

        $response->assertSee('Info about the driver');

    }

    public function test_api_returns_report(): void
    {   
        // $response = $this->get('/api/v1/report/');
        // $response->assertStatus(200); вот это работает 

        $response = $this->getJson('/api/v1/report/?format=json');
          
        $obj = new ReportService();
        $report = $obj->BuildReport();

        $response->assertJson(response()->json([200, $report])); // А тут пишет Invalid JSON was returned from the route. 
        
        
    }


}
