<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function register(Request $request)
    {
        return view('front.register');
    }
    public function registerAttempt(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'partner' => 1,
        ]);

        // $token = $user->createToken('auth_token')->plainTextToken;

        return redirect('login');
    }

    public function login()
    {
        return view('front.login');

    }
    public function loginAttempt(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            session()->flash('error', 'Login attempt failed. Please check your credentials and try again.');
            return redirect('login');
        }

        $user = User::where('email', $request->email)->firstOrFail();


        session()->flash('success', 'Login attempt success.');
        return redirect('home');

        // $token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
}
