<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index_home() {
        return view('index');
    }

    public function index_login() {
        return view('login');
    }
}
