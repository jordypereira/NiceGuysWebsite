<?php

namespace App\Http\Controllers;

use App\HomeBlock;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blocks = HomeBlock::all();
        return view('pages/homepage', ['blocks' => $blocks]);
    }
}
