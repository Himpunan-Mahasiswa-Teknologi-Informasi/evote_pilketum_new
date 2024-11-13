<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Mahasiswa;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::guard('mahasiswa')->check()) {
            return redirect('home');
        }
        return view('login');
    }

    public function actionlogin(Request $request)
    {
        $nim = $request->input('nim');
        
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if ($mahasiswa && $mahasiswa->nim === $request->input('password')) {
            if ($mahasiswa->status_vote === 'done') {
                return redirect('/')->with('error', 'You have already voted and cannot log in again.');
            }
            Auth::guard('mahasiswa')->login($mahasiswa);
            session(['id_mahasiswa' => $mahasiswa->id_mahasiswa]);
            return redirect()->intended('home');
        } else {
            return redirect('/')->with('error', 'NIM atau Password Salah');
        }
    }

    public function actionlogout()
    {
        Auth::guard('mahasiswa')->logout();
        return redirect('/');
    }
}