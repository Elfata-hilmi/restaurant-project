<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class SesiController extends Controller
{
    public function index()
    {
        return view('sesi.index'); // halaman login
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);

    $admin = Admin::where('email', $request->email)->first();
    if (!$admin) {
        return redirect()->back()->with('error', 'Email tidak ditemukan');
    }

    if (!Hash::check($request->password, $admin->password)) {
        return redirect()->back()->with('error', 'Password salah');
    }

    session(['admin' => $admin]);
    return redirect()->route('dashboard'); 
}

    public function logout()
    {
        session()->forget('admin');
        return redirect('/sesi')->with('success', 'Berhasil logout');
    }
}