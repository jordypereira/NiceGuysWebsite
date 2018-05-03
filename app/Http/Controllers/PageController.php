<?php

namespace App\Http\Controllers;

use App\Page;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    if (Auth::check()) {
        $pages = Page::all();
        return view('admin/pages/index', ['pages' => $pages, 'headerImage' => 'headerbw.jpg']);
    } else {
        return redirect()->route('login');
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    if (Auth::check()) {
        $images = Image::where('type','=','header')->get();
        return view('admin/pages/create', ['images' => $images, 'headerImage' => 'headerbw.jpg']);
    } else {
        return redirect()->route('login');
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    if (Auth::check()) {
        $page = new Page;

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|unique:pages|max:50',
            'body' => 'required',
        ]);

        $page->title = $request->get('title');
        $page->link = $request->get('link');
        $page->body = $request->get('body');
        $page->image = $request->get("image");

        $page->save();
        Session::flash('message', 'Page has been added.');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/pages');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  string $slug
   *
   * @return \Illuminate\Http\Response
   */
  public function show($slug) {
      $link = str_replace('-', ' ', $slug);
      $page = Page::where('link', $link)->firstOrFail();
      return view('pages/slugpage', ['page' => $page, 'headerImage' => 'header/'.$page['image']]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    if (Auth::check()) {
        $page = Page::find($id);
        $images = Image::where('type','=','header')->get();
        $headerImage = $page->image;
        return view('admin/pages/edit', ['page' => $page, 'headerImage' => 'header/'.$headerImage, 'images' => $images]);
    } else {
        return redirect()->route('login');
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id) {
    if (Auth::check()) {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|unique:pages,'.$id.'|max:50',
            'body' => 'required',
        ]);

        $page = Page::find($id);
        $page->title = $request->get('title');
        $page->link = $request->get('link');
        $page->body = $request->get('body');
        $page->image = $request->get('image');
        $page->save();

        Session::flash('message', 'Page has been updated.');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/pages');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    if (Auth::check()) {
        Page::destroy($id);
        Session::flash('message', 'Page has been deleted.');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/pages');
    }
  }
  public function render_upload() {
      if (Auth::check()) {
          $headerImages = Image::where('type','=','header')->get();
          $homeImages = Image::where('type','=','home')->get();
          $isEmpty = true;
          if (count($headerImages) or count($homeImages)) {
              $isEmpty = false;
          }
          return view('admin/pages/upload', ["headerImages" => $headerImages, "homeImages" => $homeImages, 'headerImage' => 'headerbw.jpg', 'isEmpty' => $isEmpty]);
      }
  }
  public function upload_image(Request $request) {
      if (Auth::check()) {
          $image = new Image;

          $validatedData = $request->validate([
              'type' => 'required',
              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          if(request()->image){
              $imageName = time().'_'.request()->image->getClientOriginalName();
              if($request->get('type') == 'home') {
                  request()->image->move(public_path('images/homeblock'), $imageName);
              }
              else {
                  request()->image->move(public_path('images/header'), $imageName);
              }
              $image->filename = $imageName;
          }
          $image->type = $request->get('type');
          $image->save();
          Session::flash('message', 'Image has been uploaded.');
          Session::flash('alert-class', 'alert-success');
          return redirect('admin/upload');
      }
  }
  public function admin_page() {
      if (Auth::check()) {
          return redirect()->route('home');
      }
      else {
          return redirect()->route('login');
      }
  }
}
