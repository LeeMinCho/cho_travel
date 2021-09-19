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
                return redirect()->to('/country');
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
}
