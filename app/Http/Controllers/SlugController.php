<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class SlugController extends Controller {

  public function slugpage($slug) {
    $title = str_replace('-', ' ', $slug);
    $page = Page::where('title', $title)->firstOrFail();
    return view('pages/slugpage', ['page' => $page]);
  }
}
