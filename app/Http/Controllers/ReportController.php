<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\VehicleRequest;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\User;


class ReportController extends Controller
{

    public function user(Request $request)
    {
        return view('page.report.user');
    }


    public function vehicle(Request $request)
    {
        return view('page.report.vehicle');
    }


    public function driver(Request $request)
    {
        return view('page.report.driver');
    }


    public function vehicle_request(Request $request)
    {
        return view('page.report.vehicle-request');
    }


}