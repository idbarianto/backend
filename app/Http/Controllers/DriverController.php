<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Driver;

use Validator;

class DriverController extends Controller
{

    public function index(Request $request)
    {
        $data = Driver::get();
        return view('page.driver.index', [
            "data" => $data,
        ]);
    }


    public function form(Request $request)
    {
        return view('page.driver.form', [
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
        $obj                = new Driver;
        $obj->name          = $request->name;
        $obj->description   = $request->description;
        $obj->active        = ($request->active) ? true : false;
        if(!$obj->save()) {
            return redirect()->back()->with("error", "Failed to save data");
        }
        return redirect("driver")->with("success", "Data has been saved");
    }

    
    public function edit(Request $request, $id)
    {
        $data = Driver::find(decrypt($id));
        return view('page.driver.edit', [
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
        $obj                = Driver::find(decrypt($id));
        $obj->name          = $request->name;
        $obj->description   = $request->description;
        $obj->active        = ($request->active) ? true : false;
        if(!$obj->save()) {
            return redirect()->back()->with("error", "Failed to update data");
        }
        return redirect("driver")->with("success", "Data has been updated");
    }

    
    
    public function delete(Request $request)
    {
        $data = Driver::find(decrypt($request->id));
        if(!$data->delete()) {
            return redirect()->back()->with("error", "Failed to delete data");
        }
        return redirect("driver")->with("success", "Data has been deleted");
    }



}