<?php

namespace App\Http\Controllers;


use App\HomeBlock;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeBlockController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::check()) {
            $blocks = HomeBlock::all();
            return view('admin/home/index', ['blocks' => $blocks, 'headerImage' => 'headerbw.jpg']);
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
            $images = Image::where('type','=','home')->get();
            return view('admin/home/create', ['headerImage' => 'headerbw.jpg', 'images' => $images]);
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
            $homeBlock = new HomeBlock;

            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'upload' => 'required_without_all:image,video',
                'image' => 'required_without_all:upload,video',
                'video' => 'required_without_all:upload,image',
            ]);

            if (request()->upload) {
                $image = new Image;

                $request->validate([
                    'type' => 'required',
                    'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $imageName = time().'_'.request()->upload->getClientOriginalName();
                request()->upload->move(public_path('images/homeblock'), $imageName);
                $image->filename = $imageName;
                $image->type = $request->get('type');
                $image->save();

                $homeBlock->image = $imageName;
            } elseif(request()->image) {
                $request->validate([
                    'image' => 'required',
                ]);
                $homeBlock->image = $request->get('image');
            }

            $homeBlock->video = $request->get('video');
            $homeBlock->title = $request->get('title');
            $homeBlock->text = $request->get('text');

            $homeBlock->save();
            Session::flash('message', 'Home Block has been added.');
            Session::flash('alert-class', 'alert-success');
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $homeblock = HomeBlock::find($id);
        return view('home/show', ['homeblock' => $homeblock, 'headerImage' => 'headerbw.jpg']);
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
            $homeblock = HomeBlock::find($id);
            $images = Image::where('type', '=', 'home')->get();
            return view('admin/home/edit', ['homeblock' => $homeblock, 'headerImage' => 'headerbw.jpg', 'images' => $images]);
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
                'text' => 'required',
            ]);

            $homeBlock = HomeBlock::find($id);
            $homeBlock->title = $request->get('title');
            $homeBlock->text = $request->get('text');
            $homeBlock->video = $request->get('video');
            if(!empty($request->get('image'))) $homeBlock->image = $request->get('image');
            $homeBlock->save();

            Session::flash('message', 'Block has been updated.');
            Session::flash('alert-class', 'alert-success');
            return redirect('/');
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
            HomeBlock::destroy($id);
            Session::flash('message', 'Block has been deleted.');
            Session::flash('alert-class', 'alert-success');
            return redirect('/');
        }
    }
}