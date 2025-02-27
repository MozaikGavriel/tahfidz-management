<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Properti untuk menentukan redirect setelah login
    protected $redirectTo = '/dashboard';

    // Metode untuk menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        // Simpan pesan notifikasi di session
        session()->flash('success', 'Selamat datang, ' . $user->name . '!');
        return redirect()->intended($this->redirectPath());
    }

    // Metode untuk menangani redirect setelah login
    // protected function authenticated(Request $request, $user)
    // {
    //     return redirect()->route('dashboard'); // Arahkan ke route 'dashboard'
    // }
}