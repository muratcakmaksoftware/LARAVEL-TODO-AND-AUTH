<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|min:3|max:20',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $name = $request->input("name");
        $username = $request->input("username");
        $email = $request->input("email");
        $password = $request->input("password");

        if(User::where("username", $username)->exists()){
            $errorMessage = "Kullanıcı Adı başkası tarafından alınmış.";
            return redirect()->back()->with('errorMessage', $errorMessage);
        }

        if(User::where("email", $email)->exists()){
            $errorMessage = "E-Mail Adresi zaten sistemde kayıtlı.";
            return redirect()->back()->with('errorMessage', $errorMessage);
        }

        $user = new User;
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        return redirect()->route('guest.login');
    }
}
