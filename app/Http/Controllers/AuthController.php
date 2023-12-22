<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.loginForm');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20|min:3',
            'email' => 'required|email|unique:users_data_table,email',
            'password' => 'required|string|min:8'
        ], [
            'name.required' => 'Name is required',
            'name.max' => 'Maximum must be 20 character',
            'name.min' => 'Minimum should be 3 character',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already Exist',
            'password.required' => 'Password is required',
            'password.min' => 'minimum 8 character is required',
        ]);
        $token = Str::uuid();

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'confirm_token' => $token,
        ]);
        $user->save();

        Mail::send('emails.signup', ["user" => $user, "token" => $token], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject("Welcome to my site");
        });

        return "Please check your mail";
    }

    public function confrimRegistration($token)
    {
        $user = User::where('confirm_token', $token)->first();
        if ($user) {
            $user->confirm_token = null;
            $user->save();
            return redirect()->route('login')->with('success', 'Registration confirmed successfully');
        }

        return redirect()->route('register')->with('error', 'Invalid registration confirmation link');
    }



    public function Login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
