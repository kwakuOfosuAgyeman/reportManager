<?php

namespace App\Http\Controllers;

use App\Models\CustomReports;
use App\Models\Reports;
use Illuminate\Http\Request;

class CustomReportController extends Controller
{
    //
    public function columnMaintenance($id)
    {
        $report = Reports::where('id', $id)->first();
        $customColumns = CustomReports::where('report_id', $id)->get();
        
        return view('user.columnMaintenance', compact('report','customColumns'));
    }

    public function addCustomColumn($id)
    {
        $report = Reports::where('id', $id)->first();
        // return view('user.addColumn',compact('report');
        return view('user.addColumn', compact('report'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'report_id' => 'required',
            'custom_column' => 'required',
            'description' => 'required',
            'type' => 'required',
            'size' => 'required',
            'decimal_size' => 'required',
            'manual_editing' => 'required',
            'mass_update' => 'required',
        ]);
       

        $create_cc = CustomReports::create([
            'report_id' => $request->report_id,
            'custom_column' => $request->custom_column,
            'description' => $request->description,
            'type' => $request->type,
            'size' => $request->size,
            'decimal_size' => $request->decimal_size,
            'manual_editing' => $request->manual_editing,
            'mass_update' => $request->mass_update,
        ]);

        if($create_cc){
            return redirect()->route('user.columnMaintenance', ['id' => $request->id])
                        ->with("Success", "Report created successfully");
        }

    }


    public function edit($id)
    {
        $report_col = CustomReports::where('id', $id)->first();
        $report = Reports::where('id', $report_col->report_id)->first();
        return view('user.editCustomColumn', compact('report_col','report'));
    }

    public function updateColumn(Request $request)
    {
        // dd($request);
        $updateData = $request->validate([
            'id' => 'required',
            'report_id' => 'required',
            'custom_column' => 'required',
            'description' => 'required',
            'type' => 'required',
            'size' => 'required',
            'decimal_size' => 'required',
            'manual_editing' => 'required',
            'mass_update' => 'required',
        ]);

        $column = CustomReports::where('id', $request->id)->first();

        if(isset($column)){
            CustomReports::where('id', $request->id)->update($updateData);
            return redirect()->route('user.columnMaintenance', ['id' => $request->id])
                        ->with('success','Report updated successfully');
        }else{
            return redirect()->route('user.columnMaintenance', ['id' => $request->id])
                        ->with('failed','Report does not exist');
        }



    }


    
}
