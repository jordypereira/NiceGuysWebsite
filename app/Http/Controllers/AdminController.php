<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class AdminController extends Controller
{
    public function index() {
        return view('pages/adminpage');
    }


}
