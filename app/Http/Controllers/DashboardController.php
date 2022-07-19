<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\VehicleRequest;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\User;


use DB;

class DashboardController extends Controller
{

    public function index(Request $request)
    {

        $count = (object) [
            "user" => User::count(),
            "driver" => Driver::count(),
            "vehicle" => Vehicle::count(),
            "vehicle_request" => VehicleRequest::count(),
            "vehicle_request_waiting" => VehicleRequest::where("request_status","Waiting")->count(),
        ];



        $sql = "SELECT MONTH (request_date) as bulan, count(*) as total from vehicle_requests where YEAR (request_date) = YEAR (CURDATE()) group by MONTH (request_date)";
        $data = DB::select($sql);

        $data_p_month = [];
        foreach(range(1,12) as $month) {
            foreach($data as $dbm) {
                $dt = 0;
                if($dbm->bulan == $month) {
                    $dt += $dbm->total;
                }
                array_push($data_p_month, $dt);
            }
        }

        return view('page.dashboard.index', [
            "count" => $count,
            "data_chart" => json_encode($data_p_month),
        ]);
    }


}