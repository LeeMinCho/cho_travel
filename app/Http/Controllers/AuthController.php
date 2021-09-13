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
        $emailUser = User::where('email', $request->email)->first();
        if ($emailUser) {
            $user = User::where('password', Hash::check($request->password, $emailUser->email))->first();
            if ($user) {
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
}
