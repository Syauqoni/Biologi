<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan halaman register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi user
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'skor'     => 0,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login user
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // Ganti dengan halaman tujuan setelah login
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Menampilkan leaderboard berdasarkan skor tertinggi
    public function leaderboard()
    {
        $users = User::orderByDesc('skor')->take(10)->get();
        return view('home.leaderboard', compact('users'));
    }
}
