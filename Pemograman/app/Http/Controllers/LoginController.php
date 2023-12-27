<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if (auth()->check()) {
            $jabatan = auth()->user()->jabatan_id;
            // Mengarahkan ke dashboard sesuai dengan jabatan
            if ($jabatan == 1||$jabatan == 2||$jabatan == 3||$jabatan == 4) {
                return redirect()->intended('/unit-dashboard');
            } elseif ($jabatan === 5) {
                return redirect()->intended('/TU-dashboard');
            } elseif ($jabatan === 6) {
                return redirect()->intended('/resepsionis-dashboard');
            } elseif ($jabatan === 7){
                return redirect()->intended('/admin');
            }
        }
        return view('Login.index',[
            'title'=>'Login'
        ]);
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $jabatan = auth()->user()->jabatan_id;
            if ($jabatan == 1||$jabatan == 2||$jabatan == 3||$jabatan == 4 ) {
                return redirect()->intended('/unit-dashboard');
            } elseif ($jabatan === 5) {
                return redirect()->intended('/TU-dashboard');
            } elseif ($jabatan === 6) {
                return redirect()->intended('/resepsionis-dashboard');
            } elseif ($jabatan === 7){
                return redirect()->intended('/admin');
            }
            //return redirect()->intended('/dashboard');
        }
        
        return back()->with('status', 'Periksa kembali email atau password anda!');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
