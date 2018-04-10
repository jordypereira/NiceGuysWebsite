<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function index() {
        return view('pages/adminpage');
    }

    public function create() {
        return view('pages/admin/addPage');
    }

    public function store(Request $request) {
        $page = new Page;

        $page->title = $request->title;
        $page->body = $request->body;

        $page->save();
        return view('pages/admin/addPage');
    }


}
