<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeBlock;

class CountController extends Controller
{
    public function show($id) {
        $homeBlock = HomeBlock::find($id);
        $homeBlock->counter_value += 1;
        $homeBlock->save();

        return redirect()->to('/');
    }
}
