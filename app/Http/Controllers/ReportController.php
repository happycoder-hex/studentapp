<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function index()
    {
        Log:info('ReportController::index function');
        $studentsByMonths = DB::select(" SELECT DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total_students FROM students GROUP BY DATE_FORMAT(created_at, '%Y-%m') ORDER BY month ");
        $resultsArray = json_decode(json_encode($studentsByMonths), true);
        $combinedArray = [];
        $totalPerMonth = [];
        foreach ($resultsArray as $studentsByMonth) 
        { 
             echo $studentsByMonth['month'].'---'.$studentsByMonth['total_students'].'<br>'; 
 
            $combinedArray[] = $studentsByMonth['month'];
            $totalPerMonth[] = $studentsByMonth['total_students'];          
         }

         $data = [
            'labels' => $combinedArray,
            'datasets' => [
                [
                    'label' => 'Students Data',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'data' => $totalPerMonth
                ]
            ]
        ];      
        return view('report', compact('data'));
    }


    public function index_course(){

        
    }

    public function index_payment(){

        
    }
}

