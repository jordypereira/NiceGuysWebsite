<?php

namespace App\Http\Controllers;

use App\HomeBlock;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $blocks = HomeBlock::join('orders', 'home_blocks.id', '=', 'orders.home_blocks_id')
            ->select('*')
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

        return view('pages/homepage', ['blocks' => $blocks, 'headerImage' => 'headerbw.jpg']);
    }
}
