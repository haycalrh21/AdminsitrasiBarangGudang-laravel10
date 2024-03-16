<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
   public function pageLogin (){
    return view('auth.login');
   }

   public function pageRegister(){
    return view('auth.register');
   }


   public function register(Request $request)
   {
       // Validasi input dari form registrasi
       $request->validate([
           'first_name' => 'required|string|max:255',
           'last_name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:1|confirmed',
       ]);


       try {


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('halamanlogin')->with('success', 'Your account has been registered successfully! Please login.');

    } catch (\Throwable $th) {
        return redirect()->back()->withInput()->withErrors(['error' => 'Failed to register. Please try again later.']);
    }

   }


   public function login(Request $request)
   {
       // Validasi input dari form login
       $request->validate([
           'email' => 'required|string|email|max:255',
           'password' => 'required|string|min:1',
       ]);

       // Coba melakukan proses otentikasi pengguna
       if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
           // Jika otentikasi berhasil, redirect ke dashboard
           return redirect()->route('dashboard');
       } else {
           // Jika otentikasi gagal, kembali ke halaman login dengan pesan error
           return redirect()->back()->withInput()->withErrors(['error' => 'Invalid email or password.']);
       }
   }
   public function logout(){
    Auth::logout();
    return redirect('/');

   }
}
