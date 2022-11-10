<?php

namespace App\Http\Controllers;

use App\Models\CustomReports;
use App\Models\Reports;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

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

    public function generateReport()
    {
        // include the file here
        include storage_path('app\public\scripts\test1.php');
        // when the function is called, it is run in a route

        return $return_str;
    }

    public function runReport($id)
    {
        // $report = $this->generateReport();
        // $data = include storage_path('app\public\scripts\test1.php');
        $report = Reports::where('id', $id)->first();

        // $st = storage_path('app\public\scripts\test1.php');

        $my_curl = curl_init();

        /**
            * We should try to pass the data through the url to the script using a get method
            * The script would return data here.
            * If there data is what we want, we handle what we've received, then display
        */
        //dd(asset('script/'.$report->file_name ));
        curl_setopt($my_curl, CURLOPT_URL, asset('script/'.$report->file_name ));
        curl_setopt ($my_curl, CURLOPT_TIMEOUT, 60);
        // curl_setopt($my_curl, CURLOPT_FILE, 'C:\xampp\htdocs\curl_test\getInfo.php');
        curl_setopt($my_curl, CURLOPT_RETURNTRANSFER, 1);

        $return_str = curl_exec($my_curl);
        // $return_str = json_decode($return_str);
        $return_str = json_decode($return_str, true);
        //dd($return_str);
        //dd($return_str);
        curl_close($my_curl);

        $customColumns = CustomReports::where('report_id', $id)->get();


        return view('user.runReport', compact('report','return_str','customColumns'));
    }

    public function columnMaintenance($id)
    {
        $report = Reports::where('id', $id)->first();
        $data = $this->generateReport();
        return view('user.columnMaintenance', compact('report', 'data'));
    }
        // var_dump($return_str[0][id]);

    public function addColumn()
    {
        return view('user.addColumn');
    }


}
