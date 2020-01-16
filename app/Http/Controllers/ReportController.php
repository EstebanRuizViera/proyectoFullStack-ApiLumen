<?php

namespace App\Http\Controllers;
use JasperPHP\JasperPHP as JasperPHP;
use Illuminate\Http\Request;

// dd(__DIR__ . '/../../vendor/cossou/jasperphp/examples/hello_world.jasper');
class ReportController extends Controller {

    public function generateReport() {
        $jasper = new JasperPHP;
        $jasper->compile(base_path('//Public/listAirport.jrxml'))->execute();
        
        $filename = 'listAirport';
        $output = base_path('//Public/' . $filename);
        $jasper->process(
                base_path('//Public/listAirport.jasper'), 
                $output,
	            array('pdf', 'rtf'),
                array(),
                array(
                    'driver' => 'mysql',
                    'host' => 'localhost',
                    'port' => '3306',
                    'database' => 'airport',
                    'username' => 'homestead',
                    'password' => 'secret',
                    
                )
        )->execute();
        print_r($jasper->output());
        print_r('Pdf almacenado en //Public/');
    }

}