<?php

namespace App\Http\Controllers;

use App\HomeBlock;
use App\HomeHeader;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blocks = HomeBlock::all()
            ->sortBy('order');

        foreach($blocks as $key => $block) {
            $blocks[$key]['type'] = $this->getType($block);
        }

        $header = HomeHeader::find(1);
        $headerImage = 'headerbw.jpg';
        if($header) $headerImage = 'header/' . $header->image;

        return view('pages/homepage', ['blocks' => $blocks, 'headerImage' => $headerImage]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editHeader(){
        if (Auth::check()) {
            $header = HomeHeader::find(1);
            $images = Image::where('type', '=', 'header')->get();

            $headerImage = 'headerbw.jpg';
            if($header) $headerImage = 'header/' . $header->image;

            return view('admin/home/header/edit', ['header' => $header, 'headerImage' => $headerImage, 'images' => $images]);
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
    public function updateHeader(Request $request) {
        if (Auth::check()) {
            $header = HomeHeader::find(1);
            if(!$header){
                $header = new HomeHeader;
            }
            if (request()->upload) {
                $image = new Image;

                $request->validate([
                    'type' => 'required',
                    'upload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $imageName = time().'_'.request()->upload->getClientOriginalName();
                request()->upload->move(public_path('images/header'), $imageName);
                $image->filename = $imageName;
                $image->type = $request->get('type');
                $image->save();

                $header->image = $imageName;
            } else {
                $request->validate([
                    'image' => 'required',
                ]);
                $header->image = $request->get('image');
            }

            $header->save();
            Session::flash('message', 'Header Image is succesvol gewijzigd.');
            Session::flash('alert-class', 'alert-success');
            return redirect()->to('/');
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
