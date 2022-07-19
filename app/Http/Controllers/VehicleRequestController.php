<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\VehicleRequest;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\User;

use App\Models\Notification;
use App\Models\ApprovalRequest;

use Validator;


class VehicleRequestController extends Controller
{

    public function index(Request $request)
    {
        $data = VehicleRequest::get();
        return view('page.vehicle-request.index',[
            "data" => $data,
        ]);
    }
    
    
    public function detail(Request $request, $id)
    {
        $data = VehicleRequest::find(decrypt($id));
        return view('page.vehicle-request.detail',[
            "data" => $data,
        ]);
    }

    
    public function approve(Request $request, $id)
    {
        $result = $request->approval;
        $remark = $request->approval_remark;
        $approvals = ApprovalRequest::where("request_id", decrypt($id))->get();

        $req = VehicleRequest::find(decrypt($id));
        if($result == "Reject") {

            foreach($approvals as $key => $obj) {
                if($obj->approver == \Auth::user()->id && $obj->current == true) {
                    $obj->approval_date     = date('Y-m-d H:i:s');
                    $obj->approval_remark   = $remark;
                    $obj->status            = $result;
                    $obj->current           = false;
                    $obj->update();
                } else {
                    if($obj->status == "Waiting") {
                        $obj->status            = "-";
                        $obj->update();
                    }
                }
            }
            $req->request_status = $result;
            $req->update();
            
            $notif = new Notification;
            $message = "Your request rejected by " . \Auth::user()->name;
            $message .= "<a href='javascript:;'><span class='badge badge-primary'>Req. No#".$obj->request_id."</span></a>";
            $notif->message = $message;
            $notif->user_id = $req->created_by;
            $notif->read    = false;
            $notif->save();

        } else {
            $next = 0;
            foreach($approvals as $key => $obj) {
                if($obj->approver == \Auth::user()->id && $obj->current == true) {
                    $obj->approval_date     = date('Y-m-d H:i:s');
                    $obj->approval_remark   = $remark;
                    $obj->status            = $result;
                    $obj->current           = false;
                    $obj->update();
                    
                    $notif = new Notification;
                    $message = "Your request approved by " . \Auth::user()->name;
                    $message .= "<a href='javascript:;'><span class='badge badge-primary'>Req. No#".$obj->request_id."</span></a>";
                    $notif->message = $message;
                    $notif->user_id = $req->created_by;
                    $notif->read    = false;
                    $notif->save();
                    
                } else {
                    if($next == 0 && $obj->status == "Waiting") {
                        $obj->current = true;
                        $obj->update();

                        $notif = new Notification;
                        $message = "New request created and need your approval";
                        $message .= "<a href='javascript:;'><span class='badge badge-primary'>Req. No#".$obj->request_id."</span></a>";
                        $notif->message = $message;
                        $notif->user_id = $obj->approver;
                        $notif->read    = false;
                        $notif->save();
                        $next++;
                    }
                }
            }
            if($next == 0) {
                $req = VehicleRequest::find(decrypt($id));
                $req->request_status = $result;
                $req->update();
            }
        }
        
        return redirect()->back()->with("success", "Data has been updated");

    }


    public function form(Request $request)
    {
        $vehicle  = Vehicle::where("active",true)->get();
        $driver   = Driver::where("active",true)->get();
        $approver = User::where("role","Head")->get();
        return view('page.vehicle-request.form',[
            "vehicle"   => $vehicle,
            "driver"    => $driver,
            "approver"  => $approver,
        ]);
    }

    
    
    public function save(Request $request)
    {
        $obj                = new VehicleRequest;
        $obj->request_date  = $request->request_date;
        $obj->vehicle_id    = $request->vehicle_id;
        $obj->driver_id     = $request->driver_id;
        $obj->description   = $request->description;
        $obj->draft         = ($request->draft) ? true : false;
        if($request->submit) {
            $obj->draft             = false;
            $obj->request_status    = "Waiting";
            $obj->request_remark    = $request->request_remark;
        }
        if(!$obj->save()) {
            return redirect()->back()->with("error", "Failed to save data");
        }
        $approver = $request->approver;
        if(is_array($approver)) {
            $request_id = $obj->id;
            foreach($approver as $key => $val) {

                $approval = new ApprovalRequest;
                $approval->request_id = $request_id;
                $approval->approver   = $val;
                $approval->status     = "Waiting";
                $approval->current    = ($key ==  0) ? true : false;
                $approval->request_date = date("Y-m-d H:i:s");
                $approval->save();
                
                $notif = new Notification;
                $message = "New request created and need your approval";
                $message .= "<a href='javascript:;'><span class='badge badge-primary'>Req. No#".$request_id."</span></a>";
                $notif->message = $message;
                $notif->user_id = $val;
                $notif->read    = false;
                if($key == 0) {
                    $notif->save();
                }
            }
        }
        return redirect("vehicle-request")->with("success", "Data has been saved");
    }

    
    public function edit(Request $request, $id)
    {
        $vehicle  = Vehicle::get();
        $driver   = Driver::where("active",true)->get();
        $approver = User::where("role","Head")->get();
        $data     = VehicleRequest::find(decrypt($id));
        return view('page.vehicle-request.edit',[
            "vehicle"   => $vehicle,
            "driver"    => $driver,
            "approver"  => $approver,
            "data"      => $data,
        ]);
    }

    
    
    public function update(Request $request, $id)
    {
        $obj                = VehicleRequest::find(decrypt($id));
        $obj->request_date  = $request->request_date;
        $obj->vehicle_id    = $request->vehicle_id;
        $obj->driver_id     = $request->driver_id;
        $obj->description   = $request->description;
        $obj->draft         = ($request->draft) ? true : false;
        if($request->submit) {
            $obj->draft             = false;
            $obj->request_status    = "Waiting";
            $obj->request_remark    = $request->request_remark;
        }
        if(!$obj->save()) {
            return redirect()->back()->with("error", "Failed to save data");
        }
        $approver = $request->approver;
        if(is_array($approver)) {
            $request_id = $obj->id;
            foreach($approver as $key => $val) {

                $approval = new ApprovalRequest;
                $approval->request_id = $request_id;
                $approval->approver   = $val;
                $approval->status     = "Waiting";
                $approval->current    = ($key ==  0) ? true : false;
                $approval->request_date = date("Y-m-d H:i:s");
                $approval->save();
                
                $notif = new Notification;
                $message = "New request created and need your approval";
                $message .= "<a href='javascript:;'><span class='badge badge-primary'>Req. No#".$request_id."</span></a>";
                $notif->message = $message;
                $notif->user_id = $val;
                $notif->read    = false;
                if($key == 0) {
                    $notif->save();
                }
            }
        }
        return redirect("vehicle-request")->with("success", "Data has been saved");
    }





    public function delete(Request $request)
    {
        $data = VehicleRequest::find(decrypt($request->id));
        if(!$data->delete()) {
            return redirect()->back()->with("error", "Failed to delete data");
        }
        return redirect("vehicle-request")->with("success", "Data has been deleted");
    }


}