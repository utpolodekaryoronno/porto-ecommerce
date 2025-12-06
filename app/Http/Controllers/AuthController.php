<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     // 📝 Registration Page
    public function showRegister()
    {
        return view("FrontEnd.signUp");
    }

    // 🔐 Register Store
    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:100',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:6',
        ]);


        // Create new User
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user', // default role
        ]);

        return redirect()->route('login')->with('success', 'Registration Successful!');
    }


    // 🔓 Login Page
    public function showLogin()
    {
        return view("FrontEnd.login");
    }

    // 🧾 Login Store
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required',
            'password' => 'required|min:6',
        ]);

        Auth::guard('web')->attempt($credentials);

        // ✅ Check if "Remember Me" is checked
        $remember = $request->has('remember');


        if(Auth::guard('web')-> attempt($credentials, $remember)){
            if(Auth::guard('web')->user()->role === 'admin'){
                return redirect()->route('admin')->with('success', 'Login Successful!');
            }
            return redirect()->route('home')->with('success', 'Login Successful!');
        }




        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }



    // 🚪 Logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
