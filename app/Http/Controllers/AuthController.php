<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Auth, Session, Validator, Hash;


class AuthController extends Controller
{

    
    public function sign_in(Request $req)
    {
        return view('auth.sign-in', []);
    }


    
    public function sign_in_action(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string|min:8',
        ];
  
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string',
            'password.min'          => 'Password minimal 8 karakter',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $user = User::where("email", $request->email)->first();
        if(!$user) {
            return redirect()->back()->with("fail", "Email dan password salah")->withInput($request->all);
        }
        if(!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with("fail", "Password salah")->withInput($request->all);
        }
        $data = [
            'email'      => $request->input('email'),
            'password'   => $request->input('password'),
        ];
        Auth::attempt($data, ($request->remember) ? true : false);
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            Session::flash('fail', 'Unknown error');
            return redirect()->route('sign-in')->with("fail", "Login failed")->withInput($request->all);
        }
    }




    public function sign_out(Request $request)
    {

        Auth::logout();
    
        return redirect()->route('sign-in');

    }


}