<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Validator, Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $data = User::get();
        return view('page.user.index', [
            "data" => $data,
        ]);
    }

    
    public function form(Request $request)
    {
        return view('page.user.form', [
            "data" => [],
        ]);
    }

    
    public function save(Request $request)
    {
        $valid = true;
        $rules = [
            "name"              => "required|max:50",
            "email"             => "required|max:50|unique:users,email",
            "password"          => "required|min:6",
        ];
        $messages = [
            "name.required"     => "Name cannot be empty",
            "name.max"          => "Maxlength 50 character for name",
            "email.required"    => "Email cannot be empty",
            "email.unique"      => "Email already exist",
            "email.email"       => "Email invalid format",
            "email.max"         => "Maxlength 50 character for email",
            "password.required" => "Password cannot be empty",
            "password.max"      => "Minlength 6 character for Password",
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if(!in_array($request->role, ["Admin","Head"])) {
            $valid = false;
            $validator->getMessageBag()->add('role', 'Invalid role');   
        }
        if(!$valid || $validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all)->with("error", "Failed to update data");
        }
        
        $obj                = new User;
        $obj->name          = $request->name;
        $obj->email         = $request->email;
        $obj->role          = $request->role;
        $obj->password      = Hash::make($request->password);
        if(!$obj->save()) {
            return redirect()->back()->with("error", "Failed to save data");
        }
        return redirect("user")->with("success", "Data has been saved");
    }

    
    public function edit(Request $request, $id)
    {
        $data = User::find(decrypt($id));
        return view('page.user.edit', [
            "data" => $data,
        ]);
    }

    
    
    public function update(Request $request, $id)
    {
        $valid = true;
        $rules = [
            "name"              => "required|max:50",
            "email"             => "required|max:50|unique:users,email,". decrypt($id),
        ];
        if($request->reset_password) {
            $rules = array_merge($rules, ["password" => "required|min:6"]);
        }

        $messages = [
            "name.required"     => "Name cannot be empty",
            "name.max"          => "Maxlength 50 character for name",
            "email.required"    => "Email cannot be empty",
            "email.unique"      => "Email already exist",
            "email.email"       => "Email invalid format",
            "email.max"         => "Maxlength 50 character for email",
        ];
        
        if($request->reset_password) {
            $messages = array_merge($messages, [
                "password.required" => "Password cannot be empty",
                "password.max"      => "Minlength 6 character for Password"
            ]);
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if(!in_array($request->role, ["Admin","Head"])) {
            $valid = false;
            $validator->getMessageBag()->add('role', 'Invalid role');   
        }
        if(!$valid || $validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all)->with("error", "Failed to update data");
        }
        $obj                = User::find(decrypt($id));
        $obj->name          = $request->name;
        $obj->email         = $request->email;
        $obj->role          = $request->role;
        if($request->reset_password) {
            $obj->password  = Hash::make($request->password);
        }
        if(!$obj->save()) {
            return redirect()->back()->with("error", "Failed to save data");
        }
        return redirect("user")->with("success", "Data has been saved");
    }

    

    public function delete(Request $request)
    {
        $data = User::find(decrypt($request->id));
        if(!$data->delete()) {
            return redirect()->back()->with("error", "Failed to delete data");
        }
        return redirect("user")->with("success", "Data has been deleted");
    }


}