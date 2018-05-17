<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::check()) {
            $headerImages = Image::where('type','=','header')->get();
            $homeImages = Image::where('type','=','home')->get();
            return view('admin/images/create', ["headerImages" => $headerImages, "homeImages" => $homeImages, 'headerImage' => 'headerbw.jpg']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (Auth::check()) {
            $headerImages = Image::where('type','=','header')->get();
            $homeImages = Image::where('type','=','home')->get();
            return view('admin/images/create', ["headerImages" => $headerImages, "homeImages" => $homeImages, 'headerImage' => 'headerbw.jpg']);
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
            return redirect('admin/images/create');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

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
            Image::destroy($id);
            Session::flash('message', 'Page has been deleted.');
            Session::flash('alert-class', 'alert-success');
            return redirect('admin/images');
        }
    }
}
