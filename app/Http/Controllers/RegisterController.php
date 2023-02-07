<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
      return view('register.index', [
        "headTitle" => "Register",
        "active" => "register"
      ]);
    }

    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255|min:5',
        'username' => ['required', 'unique:users', 'max:255', 'min:5'],
        'email' => ['required', 'unique:users', 'email:dns'],
        'password' => ['required', 'min:8', 'max:255']
      ]);

      $validatedData['password'] = Hash::make($validatedData['password']);
      User::create($validatedData);

      $request->session()->flash('regSuccess', 'Registration succesfully!, please login');
      return redirect('/login');
    }
}
