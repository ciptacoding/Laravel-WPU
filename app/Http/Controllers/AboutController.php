<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
  public function index()
  {
    return view('about', [
      "headTitle" => "About",
      "active" => "about",
      "name" => "Cipta Dwipajaya",
      "email" => "ciptadwipajaya@gmail.com"
    ]);
  }
}
