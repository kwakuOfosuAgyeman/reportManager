<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index()
    {
        $data = Reports::all();

        return view('user.reports', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('user.addReport');
    }

    public function store(Request $request)
    {
        $request->validate([
            'report_title' => 'required',
            'description' => 'required',
            'file_name' => 'required',
            'location' => 'required'
        ]);

        Reports::create([
            'report_title' => $request->report_title,
            'description' => $request->description,
            'file_name' => $request->file_name,
            'location' => $request->location
        ]);

        return redirect()->route('user.reports')
                        ->with("Success", "Report created successfully");
        
    }

    public function show(Request $request)
    {
        $data = $request->validate([
            'id' => 'required'
        ]);

        return view('user.getReport', [
            'data' => $data,
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

    public function edit($id)
    {
        $report = Reports::where('id', $id)->first();
        return view('user.editReport', compact('report'));
    }

    public function updateReport(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'report_title' => 'required',
            'description' => 'required',
            'file_name' => 'required',
            'location' => 'required'
        ]);

        $report = Reports::where('id', $request['id'])->first();

        if($report){
            /* $report['report_title'] = $request['report_title'];
            $report['description'] = $request['description'];
            $report['file_name'] = $request['file_name'];
            $report['location'] = $request['location'];
            $report->save(); */

            return redirect()->route('user.index')
                        ->with('success','Report updated successfully');
        }else{
            return redirect()->route('user.addReport')
                        ->with('failed','Report updated unsuccessfully');
        }

        

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
