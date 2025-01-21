<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CsvExportController extends Controller
{
    public function exportCsv()
    {
        $tableData = DB::table('students')->get()->toArray();

        $fileName = 'export.csv';
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('id','fname', 'lname', 'mname', 'address', 'email', 'mobile', 'photo', 'created_at', 'updated_at'); // Replace with your actual table columns

        $callback = function() use($tableData, $columns) {
            // $file = fopen('C:\tutorial\testing\Testing\export.txt', 'w');
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tableData as $row) {
                fputcsv($file, (array) $row);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
