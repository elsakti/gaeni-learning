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

    private function redirectBasedOnRole($user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin_dashboard');
        } elseif ($user->hasRole('trainer')) {
            return redirect()->route('trainer_dashboard');
        } elseif ($user->hasRole('student')) {
            return redirect()->route('student_dashboard');
        }

        Auth::logout();
        return redirect()->route('login_page')->withErrors([
            'role_error' => 'Your role is not recognized in the system.',
        ]);
    }

    public function dologin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            return $this->redirectBasedOnRole($user);
        }

        return back()->withErrors([
            'login_error' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function doregister(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'head' => 'required',
            'number' => 'required|unique:users,number',
            'institute' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => Str::upper($credentials['name']),
            'head' => Str::upper($credentials['head']),
            'number' => $credentials['number'],
            'email' => $credentials['email'],
            'institute' => Str::upper($credentials['institute']),
            'phone' => $credentials['phone'],
            'password' => Hash::make($credentials['password']),
        ]);

        Auth::login($user);
        $user->assignRole('student');
        toast('Account Has Been Registered!, Welcome ' . $credentials['name'], 'success');
        return redirect()->route('student_dashboard');
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
