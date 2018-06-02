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
            $blocks = HomeBlock::all()
                ->sortBy('order');
            foreach($blocks as $key => $block) {
                $blocks[$key]['type'] = $this->getType($block);
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

            if ($request->has('counter_title')) {
                $request->validate([
                    'counter_title' => 'required',
                ]);
                $homeBlock->counter_title = $request->get('counter_title');
            }

            if ($request->has('counter_color')) {
                $request->validate([
                    'counter_color' => 'required',
                ]);
                $homeBlock->counter_color = $request->get('counter_color');
            }

            if ($request->has('counter_font')) {
                $request->validate([
                    'counter_font' => 'required',
                ]);
                $homeBlock->counter_font = $request->get('counter_font');
            }
            if ($request->has('counter_value')) {
                $request->validate([
                    'counter_value' => 'required',
                ]);
                $homeBlock->counter_value = $request->get('counter_value');
            }

            $order = count(HomeBlock::all());
            $homeBlock->order = $order+1;

            $homeBlock->save();

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
     * @param \Illuminate\Http\Request $request
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

            if ($request->has('counter_title')) {
                $request->validate([
                    'counter_title' => 'required',
                ]);
                $homeBlock->counter_title = $request->get('counter_title');
            }

            if ($request->has('counter_color')) {
                $request->validate([
                    'counter_color' => 'required',
                ]);
                $homeBlock->counter_color = $request->get('counter_color');
            }

            if ($request->has('counter_font')) {
                $request->validate([
                    'counter_font' => 'required',
                ]);
                $homeBlock->counter_font = $request->get('counter_font');
            }
            if ($request->has('counter_value')) {
                $request->validate([
                    'counter_value' => 'required',
                ]);
                $homeBlock->counter_value = $request->get('counter_value');
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

    /**
     * Update the order of the home blocks.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateOrder(Request $request){
        if(Auth::check()) {
            $orderCount = count(HomeBlock::all());
            $orderIds = [];
            for($i = 1; $i <= $orderCount; $i++){
                if(!in_array($request->get($i), $orderIds)){
                    $orderIds[] = $request->get($i);
                }
            }
            $orderIdsCount = count($orderIds);
            if($orderIdsCount === $orderCount){
                for($i = 1; $i <= $orderCount; $i++){
                    $homeblock = HomeBlock::find($i);
                    $homeblock->order = $request->get($i);
                    $homeblock->save();

                }
            }else{
                Session::flash('message', 'Volgorde mag niet twee dezelfde waarden bevatten.');
                Session::flash('alert-class', 'alert-danger');
                return redirect('admin/home');
            }
            Session::flash('message', 'Volgorde is aangepast.');
            Session::flash('alert-class', 'alert-success');
            return redirect('admin/home');
        }
    }
    public function getType($block) {
        $count = 0;

        // title-text-image 31
        // title-text 11
        // title-image 21
        // image 20
        // video 30
        // counter 41

        if (isset($block['title'])) {
            $count += 1;
        }
        if (isset($block['text'])) {
            $count += 10;
        }
        if (isset($block['image'])) {
            $count += 20;
        }
        if (isset($block['video'])) {
            $count += 30;
        }
        if (isset($block['counter_title'])) {
            $count += 40;
        }

        if ($count == 31) {
            return 1;
        }
        if ($count == 11) {
            return 2;
        }
        if ($count == 21) {
            return 3;
        }
        if ($count == 20) {
            return 4;
        }
        if ($count == 30) {
            return 5;
        }
        if ($count == 41) {
            return 6;
        }
        return 0;
    }
}