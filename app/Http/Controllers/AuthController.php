<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                if ($user->is_user == 1) {
                    return redirect()->to('/');
                }
                return redirect()->to('/admin/country');
            } else {
                return redirect()->to('login')->with([
                    'type' => 'error',
                    'message' => 'Wrong Password',
                ]);
            }
        } else {
            return redirect()->to('login')->with([
                'type' => 'error',
                'message' => 'Email is not registered',
            ]);
        }
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = $request->all();
        $user["full_name"] = "";
        $user["phone"] = "";
        $user["password"] = Hash::make($request->get('password'));
        User::create($user);
        return redirect()->to('login')->with([
            'type' => 'success',
            'message' => 'Success register member'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('login')->with([
            'type' => 'success',
            'message' => 'You have Logged out'
        ]);
    }
}
