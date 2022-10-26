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
        $updateData = $request->validate([
            'id' => 'required',
            'report_title' => 'required|min:3',
            'description' => 'required',
            'file_name' => 'required|min:3',
            'location' => 'required'
        ]);

        $report = Reports::where('id', $request->id)->first();

        if(isset($report)){
            Reports::where('id', $request->id)->update($updateData);
            return redirect()->route('user.reports')
                        ->with('success','Report updated successfully');
        }else{
            return redirect()->route('user.addReport')
                        ->with('failed','Report does not exist');
        }



    }

    public function deleteReport(Request $request)
    {
        //dd($request->input('id'));
        $data = $request->validate([
            'id' => 'required'
        ]);


        if(Reports::destroy($data['id'])){
            return back();
        }else{
            return back()->withErrors([
                'success' => false,
                'error_message' => 'Record not deleted'
            ]);
        }
    }
}
