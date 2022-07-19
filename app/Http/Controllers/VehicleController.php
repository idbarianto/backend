<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Vehicle;

use Validator;

class VehicleController extends Controller
{

    public function index(Request $request)
    {
        $data = Vehicle::get();
        return view('page.vehicle.index', [
            "data" => $data,
        ]);
    }


    public function form(Request $request)
    {
        return view('page.vehicle.form', [
            "roles" => ["admin","head"],
        ]);
    }

    
    public function save(Request $request)
    {
        $rules      = [
            "name"         => "required|max:50",
            "description"  => "max:100",
        ];
        $messages = [
            "name.required"    => "Name cannot be empty",
            "name.max"         => "Maxlength 50 character for name",
            "description.max"  => "Maxlength 100 character for description",
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all)->with("error", "Failed to save data");
        }
        $obj                = new Vehicle;
        $obj->name          = $request->name;
        $obj->description   = $request->description;
        $obj->active        = ($request->active) ? true : false;
        if(!$obj->save()) {
            return redirect()->back()->with("error", "Failed to save data");
        }
        return redirect("vehicle")->with("success", "Data has been saved");
    }

    
    public function edit(Request $request, $id)
    {
        $data = Vehicle::find(decrypt($id));
        return view('page.vehicle.edit', [
            "data" => $data,
        ]);
    }

    
    
    public function update(Request $request, $id)
    {
        $rules      = [
            "name"         => "required|max:50",
            "description"  => "max:100",
        ];
        $messages = [
            "name.required"    => "Name cannot be empty",
            "name.max"         => "Maxlength 50 character for name",
            "description.max"  => "Maxlength 100 character for description",
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all)->with("error", "Failed to save data");
        }
        $obj                = Vehicle::find(decrypt($id));
        $obj->name          = $request->name;
        $obj->description   = $request->description;
        $obj->active        = ($request->active) ? true : false;
        if(!$obj->save()) {
            return redirect()->back()->with("error", "Failed to update data");
        }
        return redirect("vehicle")->with("success", "Data has been updated");
    }

    
    
    public function delete(Request $request)
    {
        $data = Vehicle::find(decrypt($request->id));
        if(!$data->delete()) {
            return redirect()->back()->with("error", "Failed to delete data");
        }
        return redirect("vehicle")->with("success", "Data has been deleted");
    }



}