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
        return view('pages/homepage', ['blocks' => $blocks, 'headerImage' => 'headerbw.jpg']);
    }
}
