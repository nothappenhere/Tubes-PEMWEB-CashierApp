<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successfully.');
        } else {
            return redirect()->route('login')->with('failed', 'Username or Password invalid.');
        };
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('login')->with('success_register', 'Created account successfully.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success_logout', 'Logout successfully.');
    }
}
