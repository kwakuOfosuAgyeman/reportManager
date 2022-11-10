<?php

namespace App\Http\Controllers;

use App\Models\CustomReports;
use App\Models\Reports;
use App\Models\Combobox;
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

        if($request->type === 'combobox list'){
            //dd($request->all());
            $request->validate([
                'value_description' => 'required',
                'value_code'  => 'required',
            ]);
        }
        $invalid = CustomReports::where('report_id', $request->report_id)->where('custom_column', $request->custom_column)->first();
        if(isset($invalid) && $invalid !== null){
            return back()->withErrors('error', 'Report name already exists');
        }

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
        if($request->type === 'combobox list'){
            $cc = CustomReports::where('report_id', $request->report_id)
                                ->where('custom_culomn', $request->custom_column)
                                ->first();
            $combo = Combobox::create([
                'custom_column_id' => $cc->custom_culomn,
                'value_code'       => $cc->value_code,
                'value_description'=> $cc->value_description
            ]);
            if(!$combo){
                return back()->withErrors('error', 'Unable to process this request. Please try again shortly');
            }
        }

        if($create_cc){
            return redirect()->route('user.columnMaintenance', $request->report_id)
                        ->with("Success", "Report created successfully");
        }
        return back()->withErrors('error', 'Unable to process this request. Please try again shortly');


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
            return redirect()->route('user.columnMaintenance', ['id' => $request->report_id])
                        ->with('success','Report updated successfully');
        }else{
            return redirect()->route('user.columnMaintenance', ['id' => $request->report_id])
                        ->with('failed','Report does not exist');
        }

    }

    public function deleteColumn(Request $request)
    {
        //dd($request->input('id'));
        $data = $request->validate([
            'id' => 'required'
        ]);


        if(CustomReports::destroy($data['id'])){
            return back();
        }else{
            return back()->withErrors([
                'success' => false,
                'error_message' => 'Record not deleted'
            ]);
        }
    }



}
