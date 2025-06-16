<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Method ini tidak akan terpakai jika registrasi hanya via pop-up.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    // ==========================================================
    // METHOD REGISTER INI DIUBAH AGAR BISA BEKERJA DENGAN POP-UP
    // ==========================================================
    public function register(Request $request)
    {
        // 1. Validasi input menggunakan Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // 2. Jika validasi gagal, kirim response JSON
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        // 3. Buat user baru
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'skor' => 0,
        ]);

        // 4. Langsung login-kan user setelah registrasi berhasil
        Auth::login($user);
        $request->session()->regenerate();

        // 5. Kirim response JSON sukses dengan URL tujuan
        return response()->json([
            'success' => true,
            'message' => 'Registrasi berhasil!',
            'redirect' => url('/dashboard')
        ]);
    }

    /**
     * Method ini tidak akan terpakai jika login hanya via pop-up.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Method login ini sudah disesuaikan untuk pop-up sebelumnya.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if ($request->ajax()) {
            return response()->json(['success' => true, 'redirect' => url('/dashboard')]);
        }
        return redirect('/dashboard')->with('success', 'Login berhasil');
    }
        
        return response()->json([
            'success' => false,
            'errors' => ['email' => ['Email atau password salah.']]
        ], 401);
    }

    /**
     * Method logout tidak diubah.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
