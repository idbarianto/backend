<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\ExportDataFromView;

use App\Models\VehicleRequest;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\User;

use Excel;

class ReportController extends Controller
{

    public function user(Request $request)
    {
        $temp = new User;
        
        if($request->name != "") {
            $temp = $temp->where("name", "like", "%".$request->name."%");
        }
        
        if($request->email != "") {
            $temp = $temp->where("email", "like", "%".$request->email."%");
        }
        
        if($request->role != "") {
            $temp = $temp->where("role",$request->role);
        }

        if($request->export) {
            $excel = Excel::download(new ExportDataFromView('report.data.user', $temp->get()), 'export-report-user.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            ob_end_clean(); return $excel;
        }

        return view('report.user', [
            "data"  => $temp->get(),
        ]);
    }


    public function vehicle(Request $request)
    {
        $temp = new Vehicle;
        
        if($request->name != "") {
            $temp = $temp->where("name", "like", "%".$request->name."%");
        }
        
        if($request->active != "") {
            $temp = $temp->where("active",$request->active);
        }

        if($request->export) {
            $excel = Excel::download(new ExportDataFromView('report.data.vehicle', $temp->get()), 'export-report-vehicle.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            ob_end_clean(); return $excel;
        }

        return view('report.vehicle', [
            "data"  => $temp->get(),
        ]);
    }


    public function driver(Request $request)
    {
        $temp = new Driver;
        
        if($request->name != "") {
            $temp = $temp->where("name", "like", "%".$request->name."%");
        }
        
        if($request->active != "") {
            $temp = $temp->where("active",$request->active);
        }

        if($request->export) {
            $excel = Excel::download(new ExportDataFromView('report.data.driver', $temp->get()), 'export-report-driver.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            ob_end_clean(); return $excel;
        }

        return view('report.driver', [
            "data"  => $temp->get(),
        ]);
    }



    public function vehicle_request(Request $request)
    {
        $temp = new VehicleRequest;

        if($request->vehicle != "") {
            $temp = $temp->where("vehicle_id", $request->vehicle);
        }
        if($request->driver != "") {
            $temp = $temp->where("driver_id", $request->driver);
        }
        if($request->start != "" && $request->end != "") {
            $temp = $temp->whereBetween("request_date", [$request->start, $request->end]);
        }
        if($request->export) {
            $excel = Excel::download(new ExportDataFromView('report.data.vehicle-request', $temp->get()), 'export-report-vehicle-request.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            ob_end_clean(); return $excel;
        }

        $vehicle = Vehicle::get();
        $driver  = Driver::get();
        return view('report.vehicle-request', [
            "data"    => $temp->get(),
            "vehicle" => $vehicle,
            "driver"  => $driver,
        ]);
    }


}