<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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
            'password' => 'required|min:8|confirmed'
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
            toast('Account Has Been Registered!, Welcome' . $request->name, 'success');
            $request->session()->regenerate();
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

    public function password_request()
    {
        return view('auth.forgot-password',[
            'title' => 'Forgot-Password'
        ]);
    }

    public function password_email (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }

    public function password_reset($token)
    {
        return view('auth.reset-password', [
            'title' => 'Forgot-Password',
            'token' => $token
        ]);
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                ? redirect()->route('login_page')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
    }

}
