<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('login.index', []);
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email|min:10|max:50',
      'password' => 'required|min:5|max:100',
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('/dasbor');
    }

    return back()->with('failed', 'Anda gagal masuk ke Ceritera.');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/masuk');
  }
}
