<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class SlugController extends Controller {

  public function slugpage($slug) {
    $link = str_replace('-', ' ', $slug);
    $page = Page::where('link', $link)->firstOrFail();
    return view('pages/slugpage', ['page' => $page, 'headerImage' => 'header/'.$page['image']]);
  }
}
