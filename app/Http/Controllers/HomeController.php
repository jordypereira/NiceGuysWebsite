<?php

namespace App\Http\Controllers;

use App\HomeBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $blocks = HomeBlock::all();
        return view('pages/homepage', ['blocks' => $blocks, 'headerImage' => 'headerbw.jpg']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (Auth::check()) {
            return view('admin/home/create');
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
                'text' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if(request()->image){
                $imageName = time().'_'.request()->image->getClientOriginalName();
                request()->image->move(public_path('images/homeblock'), $imageName);
                $homeBlock->image = $imageName;
            }

            $homeBlock->title = $request->get('title');
            $homeBlock->text = $request->get('text');

            $homeBlock->save();
            Session::flash('message', 'Home Block has been added.');
            Session::flash('alert-class', 'alert-success');
            return redirect('/');
        }
    }
}
