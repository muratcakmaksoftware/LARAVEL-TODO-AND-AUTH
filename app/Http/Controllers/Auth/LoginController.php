<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3|max:20',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $username = $request->input("username");
        $password = $request->input("password");

        $credentials = [
            'username' => $username,
            'password' => $password,
        ];

        $auth = auth()->guard('users');

        if($auth->attempt($credentials)){
            return redirect()->route('admin.home');
        }else{
            $errorMessage = "Incorrect username or password";
            return redirect()->back()->with('errorMessage', $errorMessage);
        }
    }
}
