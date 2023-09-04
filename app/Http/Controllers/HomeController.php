<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // function index
    public function index()
    {
        return view('app.home',['titulo' => 'Super Gestão - Home']);
    }
}
