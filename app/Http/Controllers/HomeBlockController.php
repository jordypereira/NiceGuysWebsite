<?php

namespace App\Http\Controllers;


use App\HomeBlock;
use App\Image;
use App\Order;
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
            $blocks = HomeBlock::join('orders', 'home_blocks.id', '=', 'orders.home_blocks_id')
                ->select('*', 'orders.id AS order_id')
                ->orderBy('orders.id')
                ->get();

            foreach($blocks as $key => $block) {
                if ($block['title'] && $block['text'] && $block['image'] && !$block['video']) { // title-text-image
                    $blocks[$key]['type'] = 1;
                } elseif ($block['title'] && $block['text'] && !$block['image'] && !$block['video']) { // title-text
                    $blocks[$key]['type'] = 2;
                } elseif ($block['title'] && !$block['text'] && $block['image'] && !$block['video']) { // title-image
                    $blocks[$key]['type'] = 3;
                } elseif (!$block['title'] && !$block['text'] && $block['image'] && !$block['video']) { // image
                    $blocks[$key]['type'] = 4;
                } elseif (!$block['title'] && !$block['text'] && !$block['image'] && $block['video']) { // video
                    $blocks[$key]['type'] = 5;
                }
            }

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

            if ($request->has('title')){
                $request->validate([
                    'title' => 'required|max:255',
                ]);
                $homeBlock->title = $request->get('title');
            }

            if ($request->has('text')) {
                $request->validate([
                    'text' => 'required',
                ]);
                $homeBlock->text = $request->get('text');
            }

            if ($request->has('type')) {
                if (request()->upload) {
                    $image = new Image;

                    $request->validate([
                        'type' => 'required',
                        'upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);

                    $imageName = time().'_'.request()->upload->getClientOriginalName();
                    request()->upload->move(public_path('images/home'), $imageName);
                    $image->filename = $imageName;
                    $image->type = $request->get('type');
                    $image->save();

                    $homeBlock->image = $imageName;
                } else {
                    $request->validate([
                        'image' => 'required',
                    ]);
                    $homeBlock->image = $request->get('image');
                }
            }

            if ($request->has('video')) {
                $request->validate([
                        'video' => 'required',
                    ]);
                $homeBlock->video = $request->get('video');
            }

            if ($request->has('color')) {
                $request->validate([
                    'color' => 'required',
                ]);
                $homeBlock->color = $request->get('color');
            }
            if ($request->has('font')) {
                $request->validate([
                    'font' => 'required',
                ]);
                $homeBlock->font_color = $request->get('font');
            }

            $homeBlock->save();

            $order = new Order();
            $order->home_blocks_id = $homeBlock->id;
            $order->save();

            Session::flash('message', 'Home Block has been added.');
            Session::flash('alert-class', 'alert-success');
            return redirect()->to('admin/home');
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
    public function edit(Request $request, $id) {
        if (Auth::check()) {
            $homeblock = HomeBlock::find($id);
            $images = Image::where('type', '=', 'home')->get();
            $focus = $request->get('f');
            return view('admin/home/edit', ['homeblock' => $homeblock, 'headerImage' => 'headerbw.jpg', 'images' => $images , 'focus' => $focus]);
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



            $homeBlock = HomeBlock::find($id);

            if ($request->has('title')){
                $request->validate([
                    'title' => 'required|max:255',
                ]);
                $homeBlock->title = $request->get('title');
            }

            if ($request->has('type')) {
                if (request()->upload) {
                    $image = new Image;

                    $request->validate([
                        'type' => 'required',
                        'upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);

                    $imageName = time().'_'.request()->upload->getClientOriginalName();
                    request()->upload->move(public_path('images/home'), $imageName);
                    $image->filename = $imageName;
                    $image->type = $request->get('type');
                    $image->save();

                    $homeBlock->image = $imageName;
                } else {
                    $request->validate([
                        'image' => 'required',
                    ]);
                    $homeBlock->image = $request->get('image');
                }
            }

            if ($request->has('video')) {
                $request->validate([
                    'video' => 'required',
                ]);
                $homeBlock->video = $request->get('video');
            }

            if ($request->has('text')) {
                $request->validate([
                    'text' => 'required',
                ]);
                $homeBlock->text = $request->get('text');
            }

            if ($request->has('color')) {
                $request->validate([
                    'color' => 'required',
                ]);
                $homeBlock->color = $request->get('color');
            }
            if ($request->has('font')) {
                $request->validate([
                    'font' => 'required',
                ]);
                $homeBlock->font_color = $request->get('font');
            }

            $homeBlock->save();
            Session::flash('message', 'Block has been updated.');
            Session::flash('alert-class', 'alert-success');
            return redirect()->to('admin/home');
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
            return redirect()->back();
        }
    }
}