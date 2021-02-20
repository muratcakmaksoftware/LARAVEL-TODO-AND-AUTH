<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('guest.home');
    }
}
