<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function getAllReports()
    {
        $data = Reports::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function addReport(Request $request)
    {
        $data = $request->validate([
            'report_title' => 'required',
            'description' => 'required',
            'file_name' => 'required',
            'location' => 'required'
        ]);

        $report = Reports::create($data);

        return response()->json([
            'success' => true,
            'data' => $report
        ]);
    }

    public function getReportById(Request $request)
    {
        $data = $request->validate([
            'id' => 'required'
        ]);

        $report = Reports::find($data['id']);

        if($report){
            return response()->json([
                'success' => true,
                'data' => $report
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error_message' => 'Report not found'
            ]);
        }
    }

    public function updateReport(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'report_title' => 'required',
            'description' => 'required',
            'file_name' => 'required',
            'location' => 'required'
        ]);

        $report = Reports::find($data['id']);

        if($report){
            $report['report_title'] = $data['report_title'];
            $report['description'] = $data['description'];
            $report['file_name'] = $data['file_name'];
            $report['location'] = $data['location'];
            $report->save();
        }

        return response()->json([
            'success' => true,
            'data' => $report
        ]);

    }

    public function deleteReport(Request $request)
    {
        $data = $request->validate([
            'id' => 'required'
        ]);

        $report = Reports::find($data['id']);

        if($report && $report->delete()){
            return response()->json([
                'success' => true,
                'message' => 'Record deleted'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error_message' => 'Record not deleted'
            ]);
        }
    }
}
