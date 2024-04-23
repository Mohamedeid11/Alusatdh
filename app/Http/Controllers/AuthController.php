<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (isset($user) && $user->status != 1) {
            session()->flash('error' , "'You are blocked!!, contact with admin.");
            return redirect()->back()->withInput($request->only('email'));
        }else{
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('index');
            }
        }

        session()->flash('error' , "something went wrong Credentials does not match.");
        return redirect()->back()->withInput($request->only('email'));
    }

    public function register()
    {
        return view('admin-views.auth.login');
    }
}
