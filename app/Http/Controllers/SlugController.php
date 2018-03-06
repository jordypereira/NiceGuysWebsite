<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlugController extends Controller
{
    public function slugpage($slug) {
        return view('pages/slugpage', ['slug' => $slug]);
    }
}
