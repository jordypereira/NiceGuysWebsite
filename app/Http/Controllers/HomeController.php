<?php

namespace App\Http\Controllers;

use App\HomeBlock;

class HomeController extends Controller
{
    public function index()
    {
        $blocks = HomeBlock::all();
        return view('pages/homepage', ['blocks' => $blocks, 'headerImage' => 'headerbw.jpg']);
    }
}
