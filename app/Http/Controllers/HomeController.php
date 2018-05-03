<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blocks = '';
        return view('pages/homepage', ['blocks' => $blocks]);
    }
}
