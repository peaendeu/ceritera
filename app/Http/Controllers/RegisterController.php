<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public function index()
  {
    return view('register.index');
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name'     => 'required|min:5|max:50',
      'username' => 'required|min:5|max:20|unique:users',
      'email'    => 'required|email:dns|unique:users',
      'password' => 'required|min:5|max:100'
    ]);

    // $validatedData['password'] = bcrypt($validatedData['password']);
    $validatedData['password'] = Hash::make($validatedData['password']);
    User::create($validatedData);

    // $request->session()->flash('success', 'Anda berhasil membuat akun!');
    return redirect('/masuk')->with('success', 'Anda berhasil membuat akun Ceritera!');
  }
}
