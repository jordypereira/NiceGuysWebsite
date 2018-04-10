<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminpage() {
        return view('pages/adminpage');
    }

    public function addPage() {
        return view('pages/admin/addPage');
    }
}
