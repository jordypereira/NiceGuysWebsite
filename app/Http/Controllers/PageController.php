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
        return view('admin/pages/index', ['pages' => $pages]);
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
        $images = Image::all();
        return view('admin/pages/create', ['images' => $images]);
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
   * @param  int $id
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    //
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
        $images = Image::all();
        $headerImage = $page->image;
        return view('admin/pages/edit', ['page' => $page, 'headerImage' => $headerImage, 'images' => $images]);
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
          $images = Image::all();
          return view('admin/pages/upload', ["images" => $images]);
      }
  }
  public function upload_image(Request $request) {
      if (Auth::check()) {
          $image = new Image;

          $validatedData = $request->validate([
              'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          if(request()->image){
              $imageName = time().'_'.request()->image->getClientOriginalName();
              request()->image->move(public_path('images/header'), $imageName);
              $image->filename = $imageName;
          }

          $image->save();
          Session::flash('message', 'Image has been uploaded.');
          Session::flash('alert-class', 'alert-success');
          return redirect('admin/upload');
      }
  }
}
