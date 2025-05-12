<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function sobreNosotros()
    {
        return view('home.sobreNosotros');
    }
    public function contacto()
    {
        return view('home.contacto');
    }
}
