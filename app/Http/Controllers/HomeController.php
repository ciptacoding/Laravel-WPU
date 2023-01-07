<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    return view('home', [
      "headTitle" => "Home",
      "message" => "Welcome to my homepage"
    ]);
  }
}
