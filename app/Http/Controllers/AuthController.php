<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login Page'
        ]);
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register Page'
        ]);
    }

    public function dologin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            $request->session()->regenerate();

            if ($user->hasRole('admin')) {
                return redirect()->route('admin_dashboard');
            } elseif ($user->hasRole('trainer')) {
                return redirect()->route('trainer_dashboard');
            } elseif ($user->hasRole('student')) {
                return redirect()->route('student_dashboard');
            }
        }
        alert()->error('Invalid Input', 'Invalid Input Detected!, try again.');
        return back()->withErrors([
            'error' => 'Invalid Input Detected!, try again.',
        ])->onlyInput('error');
    }

    public function doregister(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'institute' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        if ($request->password_confirmation != $request->password) {
            return back()
                ->withErrors([
                    'password' => 'Password With Confirm Password did not match!',
                ]);
        }
        if (User::where('email', $credentials['email'])->exists()) {
            return back()
                ->withErrors([
                    'email' => 'Email Already used by another user, please use another Email.',
                ])->onlyInput('email');
        }
        if (User::where('phone', $credentials['phone'])->exists()) {
            return back()
                ->withErrors([
                    'phone' => 'Phone Number Already used by another user, please use another Phone Number.',
                ])->onlyInput('phone');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'institute' => $request->institute,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);
        // dd($user);
        if (Auth::attempt(['password' => $request->password, 'email' => $user->email])) {
            $user->assignRole('student');
            $request->session()->regenerate();
            toast('Account Has Been Registered!, Welcome' . $request->name, 'success');
            return redirect()->route('login_page')->with('email', $request->email);
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
