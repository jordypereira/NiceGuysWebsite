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
            $blocks[$key]['type'] = $this->getType($block);
        }

        return view('pages/homepage', ['blocks' => $blocks, 'headerImage' => 'headerbw.jpg']);
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
