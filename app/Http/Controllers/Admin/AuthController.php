<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Hardcoded admin credentials
        $adminEmail = 'admin@serayatravel.com';
        $adminPassword = 'password123';

        if ($credentials['email'] === $adminEmail && $credentials['password'] === $adminPassword) {
            // Find or create admin user
            $user = User::firstOrCreate(
                ['email' => $adminEmail],
                [
                    'name' => 'Admin',
                    'password' => Hash::make($adminPassword),
                    'role' => 'admin',
                ]
            );

            // Ensure role is admin
            if ($user->role !== 'admin') {
                $user->update(['role' => 'admin']);
            }

            // Logout any existing web user first
            Auth::guard('web')->logout();
            $request->session()->forget('login_web_' . md5(config('app.key')));

            // Login with admin guard
            Auth::guard('admin')->login($user);
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
