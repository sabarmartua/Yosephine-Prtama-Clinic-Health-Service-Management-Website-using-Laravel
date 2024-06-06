<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'pasien') {
                return redirect()->route('pasien.dashboard');
            }
            // Tambahkan kondisi lain jika ada peran lain
        }
    
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        // Validasi data input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Coba untuk melakukan autentikasi pengguna
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Autentikasi berhasil
            if (Auth::user()->role === 'admin') {
                // Jika pengguna adalah admin, arahkan ke halaman admin
                return redirect()->route('admin.dashboard');
            } else {
                // Jika pengguna adalah pasien, arahkan ke halaman pasien
                return redirect()->route('pasien.dashboard');
            }
        } else {
            // Autentikasi gagal, kembalikan dengan pesan error
            return back()->withErrors(['login' => 'Data yang anda masukkan tidak terdaftar.']);
        }
    }

    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('pasien.dashboard');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Simpan pengguna baru ke dalam basis data
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'pasien', // Secara otomatis menetapkan nilai 'pasien' untuk kolom role
        ]);

        // Autentikasi pengguna baru
        Auth::attempt($request->only('email', 'password'));

        // Redirect ke dashboard sesuai peran pengguna
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('pasien.dashboard');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginForm');
    }
}
